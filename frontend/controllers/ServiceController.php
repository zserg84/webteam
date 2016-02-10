<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 08.09.15
 * Time: 10:32
 */

namespace frontend\controllers;


use common\models\StatementInterest;
use common\models\StatementLetter;
use frontend\components\Helper;
use yii\web\Response;
use yii\widgets\ActiveForm;

class ServiceController extends Controller
{

    public function init(){
        parent::init();

        $this->getView()->title = Helper::t('ourservices', 'PAGE_TITLE');
        $this->getView()->registerMetaTag([
            'name' => 'keywords',
            'content' => Helper::t('ourservices', 'PAGE_KEYWORDS')
        ]);
        $this->getView()->registerMetaTag([
            'name' => 'description',
            'content' => Helper::t('ourservices', 'PAGE_DESCRIPTION')
        ]);
    }

    public function actionIndex(){
        return $this->render('index');
    }

    public static function getServices(){
        return [
            'project' => 'Команды под крупные проекты',
            'web' => 'Разработка Web-сайтов',
            'mobile' => 'Разработка мобильных приложений',
            'sensor' => 'Сенсорные экраны',
            'promotion' => 'smm',
            'styles' => 'Разработка стилей',
        ];
    }

    public static function getService($service){
        $services = self::getServices();
        return isset($services[$service]) ? $services[$service] : '';
    }

    public function actionStatement(){
        $service = \Yii::$app->getRequest()->post('hiddenService');
        $model = new StatementLetter();
        $post = \Yii::$app->getRequest()->post();
        $interest = StatementInterest::findOne(1);
        $model->interest_id = $interest->id;
        if($model->load($post)){
            $model->page = \Yii::$app->request->referrer . '&hiddenService='.$service;
            $model->from = StatementLetter::getFromValue(StatementLetter::FROM_SERVICE) . '('.self::getService($service).')';
//            return $model->save(false);

            if (\Yii::$app->request->isAjax) {
                \Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

            if($model->save()){
                \Yii::$app->session->setFlash(
                    'message',
                    Helper::t('main', 'SEND_OK_MESSAGE')
                );
                return $this->redirect(\Yii::$app->request->referrer . '#' . $service);
            }
        }
        else{
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }
}