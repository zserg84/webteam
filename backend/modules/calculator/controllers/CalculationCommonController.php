<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 24.09.15
 * Time: 10:42
 */

namespace backend\modules\calculator\controllers;


use backend\modules\calculator\models\form\WorkCommonForm;
use backend\modules\calculator\models\search\WorkCommonSearch;

class CalculationCommonController extends CalculationController
{

    protected $pageTitle = 'Модуль задания цен';
    protected $editRole = 'BEditCalculationCommon';

    public function getSearchModel(){
        return WorkCommonSearch::className();
    }

    public function getFormModel(){
        return WorkCommonForm::className();
    }
} 