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
use yii\web\Response;
use yii\widgets\ActiveForm;

class ServiceController extends Controller
{

    public function init(){
        parent::init();

        $this->getView()->title = 'Команды под крупные проекты';
        $this->getView()->registerMetaTag([
            'name' => 'keywords',
            'content' => 'заказать мобильную версию сайта, заказная разработка по, agile development,
agile web development, agile команда, agile проекты, agile разработка, заказать портал,
заказать сайт на битрикс, интерактивный экран дизайн, smm-продвижение, услуги веб студии'
        ]);
        $this->getView()->registerMetaTag([
            'name' => 'description',
            'content' => 'Услуги Webteam - создаем команды под крупные проекты, сайты и сервисы,
мобильные приложения, презентации и фирменные стили, сенсорные экраны,
а также Social Media Marketing (SMM продвижение).
'
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
                    'Ваше сообщение отправлено'
                );
                return $this->redirect(\Yii::$app->request->referrer);
            }
        }
        else{
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }
}