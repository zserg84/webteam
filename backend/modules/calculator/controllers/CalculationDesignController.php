<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 23.09.15
 * Time: 12:58
 */

namespace backend\modules\calculator\controllers;


use backend\modules\calculator\models\form\WorkDesignForm;
use backend\modules\calculator\models\search\WorkDesignSearch;

class CalculationDesignController extends CalculationController
{

    protected $pageTitle = 'Расчет стоимости дизайна';
    protected $editRole = 'BEditCalculationDesign';

    public function getSearchModel(){
        return WorkDesignSearch::className();
    }

    public function getFormModel(){
        return WorkDesignForm::className();
    }
} 