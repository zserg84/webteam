<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 23.09.15
 * Time: 13:02
 */

namespace backend\modules\calculator\controllers;


use backend\modules\calculator\models\form\WorkSiteForm;
use backend\modules\calculator\models\search\WorkSiteSearch;
use yii\filters\AccessControl;

class CalculationSiteController extends CalculationController
{

    protected $pageTitle = 'Расчет стоимости корпоративного сайта';
    protected $editRole = 'BEditCalculationSite';

    public function getSearchModel(){
        return WorkSiteSearch::className();
    }

    public function getFormModel(){
        return WorkSiteForm::className();
    }
} 