<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 28.12.15
 * Time: 12:11
 */

namespace frontend\modules\calculator\controllers;

use frontend\modules\calculator\models\form\EmailForm;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\Response;
use yii\widgets\ActiveForm;

class DefaultController extends Controller
{

    public function actionPrintPage($page){
        $this->layout = 'print';
        $subworksArr = \Yii::$app->getRequest()->get('subworks');
        $subworks = [];
        $subworksArr = $subworksArr ? $subworksArr : [];
        foreach($subworksArr as $sw){
            $sw = explode(',', $sw);
            $subworks[$sw[0]] = $sw[1];
        }
        return $this->render($page, [
            'subworks' => $subworks,
        ]);
    }

    public function sendToEmail($page, $model){
        $from = "info@webteam.pro";
        $to = $model->email;
        $subject = 'Расчет стоимости';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= "From:" . $from . "\r\n";
        $adminEmail = \Yii::$app->params['adminEmail'];
        if(is_array($adminEmail)){
            $adminEmail = implode(',', $adminEmail);
        }
        if($adminEmail){
            $headers .= "Bcc: ". $adminEmail . "\r\n";
        }

        $subworks = [];
        $subworksArr = $model->subworks ? $model->subworks : [];
        foreach($subworksArr as $sw){
            $subworks[$sw[0]] = $sw[1];
        }

        $message = $this->renderPartial($page, [
            'subworks' => $subworks,
        ]);
        if(mail($to,$subject,$message, $headers)){
            \Yii::$app->session->setFlash(
                'message',
                'Ваше сообщение отправлено'
            );
            return $this->redirect('/');
        }
    }

    public function actionEmailForm($page, $from=1, $data = []){
        $model = new EmailForm();
        $model->subworks = Json::decode($data);
        $post = \Yii::$app->getRequest()->post();
        if($post){
            if($model->load($post)){
                if (\Yii::$app->request->isAjax) {
                    \Yii::$app->response->format = Response::FORMAT_JSON;
                    return ActiveForm::validate($model);
                }
                if($model->validate()){
                    $this->sendToEmail($page, $model);
                    return $this->redirect(Url::toRoute(['/']));
                }
                else{
                    \Yii::$app->response->format = Response::FORMAT_JSON;
                    return ActiveForm::validate($model);
                }
            }
        }
        return $this->renderAjax('email-form', [
            'model' => $model,
            'page' => $page,
            'from' => $from,
            'data' => $data,
        ]);
    }
} 