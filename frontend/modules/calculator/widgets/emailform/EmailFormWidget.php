<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 28.12.15
 * Time: 17:35
 */

namespace frontend\modules\calculator\widgets\emailform;

use yii\helpers\Json;

class EmailFormWidget extends \yii\base\Widget
{
    public $page;

    public $data;

    public $from;

    public function run(){
        return \Yii::$app->controller->run('/calculator/default/email-form', [
            'page' => $this->page,
            'from' => $this->from,
            'data' => Json::encode($this->data),
        ]);
    }
} 