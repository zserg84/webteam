<?php

use backend\web\theme\widgets\Box;
use yii\helpers\Html;
use yii\grid\ActionColumn;
use backend\web\theme\widgets\GridView;
use yii\grid\CheckboxColumn;
use yii\helpers\Url;

$this->title = 'Специалисты';
$this->params['subtitle'] = 'Список';
$this->params['breadcrumbs'] = [
    $this->title
];

$gridId = 'specialist-grid';
$gridConfig = [
    'id' => $gridId,
    'dataProvider' => $dataProvider,
//    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => CheckboxColumn::classname()
        ],
        'name',
        'salaryRu',
        'tax',
        'amortizationRu',
        'maintenanceRu',
        'profit',
        'usn',
        [
            'attribute' => 'visible',
            'format' => 'raw',
            'filter' => Html::activeDropDownList($searchModel, 'visible',
                [Yii::$app->getFormatter()->asBoolean(0), Yii::$app->getFormatter()->asBoolean(1)],
                ['class'=>'form-control','prompt' => 'Показывать на сайте']
            ),
            'value' => function($data){
                $class = 'glyphicon ';
                $class .= $data->visible ? 'glyphicon-ok' : 'glyphicon-remove';
                return '<span class="'.$class.'"></span>';
            }
        ],
        'salaryEn',
        'amortizationEn',
        'maintenanceEn',
    ]
];

$boxButtons = $actions = [];

$boxButtons[] = '{create}';
$boxButtons[] = '{batch-delete}';

$actions[] = '{update}';
$actions[] = '{delete}';

$showActions = true;

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