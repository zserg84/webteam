<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 22.09.15
 * Time: 16:57
 */

namespace backend\modules\calculator\controllers;

use backend\controllers\Controller;
use backend\modules\calculator\models\form\SpecialistForm;
use backend\modules\calculator\models\search\SpecialistSearch;
use backend\modules\calculator\models\Specialist;
use common\actions\BatchDeleteAction;
use common\actions\CreateAction;
use common\actions\DeleteAction;
use common\actions\IndexAction;
use common\actions\UpdateAction;
use common\models\Lang;
use common\modules\calculator\models\SpecialistLang;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

class SpecialistController extends Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'modelClass' => SpecialistSearch::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Specialist::className(),
                'formModelClass' => SpecialistForm::className(),
                'ajaxValidation' => true,
                'redirectUrl' => Url::toRoute('index'),
                'afterAction' => function($action, $model, $formModel) {
                    return $this->afterEdit($action, $model, $formModel);
                }
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Specialist::className(),
                'formModelClass' => SpecialistForm::className(),
                'redirectUrl' => Url::toRoute('index'),
                'ajaxValidation' => true,
                'beforeAction' => function($model, $formModel){
                    $languages = Lang::find()->all();
                    $itemLangs = $model->specialistLangs;
                    $itemLangs = ArrayHelper::index($itemLangs, 'lang_id');
                    foreach($languages as $language){
                        $itemLang = isset($itemLangs[$language->id]) ? $itemLangs[$language->id] : new SpecialistLang();
                        $formModel->translationName[$language->id] = $itemLang->name;
                        $formModel->translationSalary[$language->id] = $itemLang->salary;
                        $formModel->translationAmortization[$language->id] = $itemLang->amortization;
                        $formModel->translationMaintenance[$language->id] = $itemLang->maintenance;
                    }
                    return $formModel;
                },
                'afterAction' => function($action, $model, $formModel){
                    return $this->afterEdit($action, $model, $formModel);
                }
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Specialist::className(),
                'redirectUrl' => Url::toRoute(['index']),
            ],
            'batch-delete' => [
                'class' => BatchDeleteAction::className(),
                'modelClass' => Specialist::className(),
            ],
        ];
    }

    public function afterEdit($action, $model, $formModel)
    {
        $model->saveLangsRelations('specialistLangs', $formModel, 'translationName', 'name', 'specialist_id');
        $model->saveLangsRelations('specialistLangs', $formModel, 'translationSalary', 'salary', 'specialist_id');
        $model->saveLangsRelations('specialistLangs', $formModel, 'translationAmortization', 'amortization', 'specialist_id');
        $model->saveLangsRelations('specialistLangs', $formModel, 'translationMaintenance', 'maintenance', 'specialist_id');

        return $model;
    }
} 