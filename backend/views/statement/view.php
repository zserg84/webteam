<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\StatementLetter */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="statement-letter-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'fio',
            'email:email',
            'phone',
            'statementInterest.name',
            'text:ntext',
            'created_at' => [
                'attribute' => 'created_at',
                'format' => 'dateTime',
            ],
            'sent_at' => [
                'attribute' => 'sent_at',
                'format' => 'dateTime',
            ],
            'from',
        ],
    ]) ?>

</div>