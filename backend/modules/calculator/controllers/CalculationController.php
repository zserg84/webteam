<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 23.09.15
 * Time: 10:22
 */

namespace backend\modules\calculator\controllers;

use backend\modules\calculator\models\interfaces\Calculation;
use backend\modules\calculator\models\search\WorkSearch;
use backend\modules\calculator\models\Work;
use backend\modules\calculator\models\WorkLang;
use common\actions\BatchDeleteAction;
use common\actions\CreateAction;
use common\actions\DeleteAction;
use common\actions\IndexAction;
use common\actions\UpdateAction;
use common\models\Lang;
use backend\controllers\Controller;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

abstract class CalculationController extends Controller implements Calculation
{
    protected $editRole;
    protected $pageTitle;

    public function getViewPath()
    {
        return \Yii::getAlias('@backend/modules/calculator/views/calculation');
    }

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'modelClass' => $this->getSearchModel(),
                'viewParams' => [
                    'pageTitle' => $this->pageTitle,
                    'editRole' => $this->editRole,
                ],
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Work::className(),
                'formModelClass' => $this->getFormModel(),
                'ajaxValidation' => true,
                'redirectUrl' => Url::toRoute('index'),
                'afterAction' => function($action, $model, $formModel) {
                    return $this->afterEdit($action, $model, $formModel);
                },
                'viewParams' => [
                    'pageTitle' => $this->pageTitle,
                    'editRole' => $this->editRole,
                ],
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Work::className(),
                'formModelClass' => $this->getFormModel(),
                'redirectUrl' => Url::toRoute('index'),
                'ajaxValidation' => true,
                'beforeAction' => function($model, $formModel){
                    $languages = Lang::find()->all();
                    $itemLangs = $model->workLangs;
                    $itemLangs = ArrayHelper::index($itemLangs, 'lang_id');
                    foreach($languages as $language){
                        $itemLang = isset($itemLangs[$language->id]) ? $itemLangs[$language->id] : new WorkLang();
                        $formModel->translationTitle[$language->id] = $itemLang->title;
                    }
                    return $formModel;
                },
                'afterAction' => function($action, $model, $formModel){
                    return $this->afterEdit($action, $model, $formModel);
                },
                'viewParams' => [
                    'pageTitle' => $this->pageTitle,
                    'editRole' => $this->editRole,
                ],
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Work::className(),
                'redirectUrl' => Url::toRoute(['index']),
            ],
            'batch-delete' => [
                'class' => BatchDeleteAction::className(),
                'modelClass' => Work::className(),
            ],
        ];
    }

    public function afterEdit($action, $model, $formModel)
    {
        $model->saveLangsRelations('workLangs', $formModel, 'translationTitle', 'title', 'work_id');

        return $model;
    }
} 