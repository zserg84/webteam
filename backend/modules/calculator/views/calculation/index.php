<?php

use backend\web\theme\widgets\Box;
use yii\helpers\Html;
use yii\grid\ActionColumn;
use backend\web\theme\widgets\GridView;
use yii\grid\CheckboxColumn;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use backend\modules\calculator\models\Work;

$this->title = $pageTitle;;
$this->params['subtitle'] = 'Список';
$this->params['breadcrumbs'] = [
    $this->title
];

$gridId = 'calculation-grid';
$gridConfig = [
    'id' => $gridId,
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'rowOptions' => function($model, $key, $index, $grid){
        if(!$model->parent_id)
            return ['style'=>"background-color:#E2E1E1"];
    },
    'columns' => [
        [
            'class' => CheckboxColumn::classname()
        ],
        [
            'attribute' => 'parent_id',
            'format' => 'raw',
            'filter' => Html::activeDropDownList($searchModel, 'parent_id',
                ArrayHelper::map(Work::find()->parents()->andWhere([
                    'worktype_id' => $searchModel->worktypeId,
                ])->all(), 'id', 'title'),
                ['class'=>'form-control','prompt' => 'Показывать на сайте']
            ),
            'value' => function($data){
                return $data->parent ? $data->parent->title : '';
            },
            'visible' => in_array($editRole, ['BEditCalculationCommon', 'BEditCalculationDesign']) ? false : true
        ],
        'title',
        'cost',
    ]
];

$boxButtons = $actions = [];
$showActions = false;
if (Yii::$app->user->can($editRole)) {
    $boxButtons[] = '{create}';
    $boxButtons[] = '{batch-delete}';
    $actions[] = '{update}';
    $actions[] = '{delete}';
    $showActions = true;
}
$gridButtons = [];

if ($showActions === true) {
    $gridConfig['columns'][] = [
        'class' => ActionColumn::className(),
        'template' => implode(' ', $actions),
        'buttons'=>$gridButtons,
    ];
}

$boxButtons = !empty($boxButtons) ? implode(' ', $boxButtons) : null; ?>

<div class="row">
    <div class="col-xs-12">
        <?php Box::begin(
            [
                'title' => $this->params['subtitle'],
                'bodyOptions' => [
                    'class' => 'table-responsive'
                ],
                'buttonsTemplate' => $boxButtons,
                'grid' => $gridId,
            ]
        ); ?>
        <?=  GridView::widget($gridConfig);?>
        <?php Box::end(); ?>
    </div>
</div>