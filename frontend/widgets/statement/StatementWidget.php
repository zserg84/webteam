<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 09.09.15
 * Time: 11:02
 */

namespace frontend\widgets\statement;

use common\models\StatementLetter;
use yii\bootstrap\Widget;

class StatementWidget extends Widget
{

    public $from;
    public $isMainPage = false;

    public function init(){
        $this->registerAsset();
    }

    public function run(){
        $model = new StatementLetter();
        return $this->render('_form', [
            'model' => $model,
            'from' => $this->from,
        ]);
    }

    public function registerAsset(){
        $view = $this->getView();
        if($this->isMainPage)
            MainAsset::register($view);
        else
            Asset::register($view);
    }
} 