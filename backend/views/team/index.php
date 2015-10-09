<?php

use backend\web\theme\widgets\Box;
use yii\helpers\Html;
use yii\grid\ActionColumn;
use backend\web\theme\widgets\GridView;
use yii\grid\CheckboxColumn;
use yii\helpers\Url;

$this->title = 'Команда';
$this->params['subtitle'] = 'Список';
$this->params['breadcrumbs'] = [
    $this->title
];

$gridId = 'team-grid';
$gridConfig = [
    'id' => $gridId,
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => CheckboxColumn::classname()
        ],
        'surname',
        'name',
        'position',
        [
            'format' => 'html',
            'value' => function ($model) {
                $link = '';
                if(!$model->isMaxOrder()){
                    $link = Html::a('вниз', Url::toRoute(['change-order', 'id'=>$model->id, 'order'=>1]));
                }
                if(!$model->isMinOrder()){
                    $link .= ($link ? ' ' : '') . Html::a('вверх', Url::toRoute(['change-order', 'id'=>$model->id, 'order'=>-1]));
                }
                return $link;
            },
        ],
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