<?php

use backend\web\theme\widgets\Box;

$this->title = 'Языки';
$this->params['subtitle'] = 'Редактирование';
$this->params['breadcrumbs'] = [
    [
        'label' => $this->title,
        'url' => ['index'],
    ],
    $this->params['subtitle']
];
$boxButtons = ['{cancel}'];

if (Yii::$app->user->can('BCreateLang')) {
    $boxButtons[] = '{create}';
}
if (Yii::$app->user->can('BDeleteLang')) {
    $boxButtons[] = '{delete}';
}
$boxButtons = !empty($boxButtons) ? implode(' ', $boxButtons) : null; ?>
<div class="row">
    <div class="col-sm-12">
        <?php $box = Box::begin(
            [
                'title' => $this->params['subtitle'],
                'renderBody' => false,
                'options' => [
                    'class' => 'box-success'
                ],
                'bodyOptions' => [
                    'class' => 'table-responsive'
                ],
                'buttonsTemplate' => $boxButtons
            ]
        );
        echo $this->render(
            '_form',
            [
                'model' => $model,
                'formModel' => $formModel,
                'box' => $box
            ]
        );
        Box::end(); ?>
    </div>
</div>