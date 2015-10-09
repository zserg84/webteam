<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 23.09.15
 * Time: 10:37
 */

namespace backend\modules\calculator\controllers;


use backend\modules\calculator\models\form\WorkFirStyleForm;
use backend\modules\calculator\models\search\WorkFirStyleSearch;

class CalculationFirstyleController extends CalculationController
{

    protected $pageTitle = 'Расчет стоимости фирменного стиля';
    protected $editRole = 'BEditCalculationFirStyle';

    public function getSearchModel(){
        return WorkFirStyleSearch::className();
    }

    public function getFormModel(){
        return WorkFirStyleForm::className();
    }
} 