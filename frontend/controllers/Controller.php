<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 09.09.15
 * Time: 12:44
 */

namespace frontend\controllers;


use common\models\Lang;
use frontend\components\Helper;
use yii\helpers\VarDumper;

class Controller extends \yii\web\Controller
{
    public $topMenu;

    public function init(){
        parent::init();

        $this->topMenu = Helper::fillDefaultMenu();
    }

    protected function _findModel($modelName, $id){
        $model = $modelName::findOne($id);
        if(!$model)
            throw new NotFoundHttpException();
        return $model;
    }

    public function beforeAction($action){

        return parent::beforeAction($action);
    }

} 