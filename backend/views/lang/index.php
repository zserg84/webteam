<?php

use yii\grid\CheckboxColumn;
use yii\jui\DatePicker;
use yii\grid\ActionColumn;
use backend\web\theme\widgets\Box;
use backend\web\theme\widgets\GridView;

$this->title = 'Языки';
$this->params['subtitle'] = 'Список';
$this->params['breadcrumbs'] = [
    $this->title
];

$gridId = 'lang-grid';

$gridConfig = [
    'id' => $gridId,
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => CheckboxColumn::classname()
        ],
        'id',
        'url',
        'name',
        [
            'attribute' => 'created_at',
            'format' => 'date',
            'filter' => DatePicker::widget(
                [
                    'model' => $searchModel,
                    'attribute' => 'created_at',
                    'options' => [
                        'class' => 'form-control'
                    ],
                    'clientOptions' => [
                        'dateFormat' => 'dd.mm.yy',
                    ]
                ]
            )
        ],
        [
            'attribute' => 'updated_at',
            'format' => 'date',
            'filter' => DatePicker::widget(
                [
                    'model' => $searchModel,
                    'attribute' => 'updated_at',
                    'options' => [
                        'class' => 'form-control'
                    ],
                    'clientOptions' => [
                        'dateFormat' => 'dd.mm.yy',
                    ]
                ]
            )
        ]
    ]
];

$boxButtons = $actions = [];
$showActions = false;

$boxButtons[] = '{create}';
$actions[] = '{update}';
$showActions = $showActions || true;

$gridButtons = [];
if (Yii::$app->user->can('BDeleteLang')) {
    $boxButtons[] = '{batch-delete}';
//    $actions[] = '{delete}';
    $actions[] = '{delete}';
    $gridButtons['delete'] = function ($url, $model) {
        return \yii\helpers\Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id],
            [
                'class' => 'grid-action',
                'data' => [
                    'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                    'method' => 'post',
                ],
            ]);
    };
    $showActions = $showActions || true;
}

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
                'grid' => $gridId
            ]
        ); ?>
        <?= GridView::widget($gridConfig); ?>
        <?php Box::end(); ?>
    </div>
</div>