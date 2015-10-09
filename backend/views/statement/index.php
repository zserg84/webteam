<?php

use backend\web\theme\widgets\Box;
use yii\helpers\Html;
use yii\grid\ActionColumn;
use backend\web\theme\widgets\GridView;
use yii\grid\CheckboxColumn;
use yii\jui\DatePicker;

$this->title = 'Заявки';
$this->params['subtitle'] = 'Список';
$this->params['breadcrumbs'] = [
    $this->title
];

$interestArray = \common\models\StatementInterest::find()->all();
$interestArray = \yii\helpers\ArrayHelper::map($interestArray, 'id', 'name');

$gridId = 'team-grid';
$gridConfig = [
    'id' => $gridId,
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'fio',
        'email',
        'phone',
        [
            'attribute' => 'interest_id',
            'format' => 'html',
            'value' => function ($model) {
                return  $model->statementInterest ? $model->statementInterest->name : '';
            },
            'filter' => Html::activeDropDownList(
                $searchModel,
                'interest_id',
                $interestArray,
                [
                    'class' => 'form-control',
                    'prompt' => 'Выберите'
                ]
            )
        ],
        [
            'attribute' => 'created_at',
            'format' => 'dateTime',
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
            'attribute' => 'sent_at',
            'format' => 'dateTime',
            'filter' => DatePicker::widget(
                [
                    'model' => $searchModel,
                    'attribute' => 'sent_at',
                    'options' => [
                        'class' => 'form-control'
                    ],
                    'clientOptions' => [
                        'dateFormat' => 'dd.mm.yy',
                    ]
                ]
            )
        ],
        'from',
//        'text',
        [
            'class' => ActionColumn::className(),
            'template' => '{view}{delete}',
        ],
    ]
];
?>
<div class="row">
    <div class="col-xs-12">
        <?php Box::begin(
            [
                'title' => $this->params['subtitle'],
                'bodyOptions' => [
                    'class' => 'table-responsive'
                ],
                'grid' => $gridId,
            ]
        ); ?>
        <?=  GridView::widget($gridConfig);?>
        <?php Box::end(); ?>
    </div>
</div>