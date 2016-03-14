<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\fileinput\BootstrapFileInput;
use common\models\Lang;
use kartik\switchinput\SwitchInput;

?>
<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => true,
//    'enableClientValidation' => true,
    'options' => [
        'id' => 'specialist_form',
        'enctype' => 'multipart/form-data',
    ]
]); ?>
<?php $box->beginBody(); ?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'visible')->widget(SwitchInput::className(), []) ?>
        </div>
    </div>
    <?
    $languages = Lang::find()->all();
    foreach($languages as $language):?>
        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($formModel, 'translationName[' . $language->id . ']', ['options' => ['class' => 'form-group']])->textInput()->label(
                    $formModel->getAttributeLabel('translationName').', '.$language->name
                );?>
            </div>
        </div>
    <?endforeach;?>
    <div class="row">
        <?foreach($languages as $language):?>
        <div class="col-sm-4">
            <?= $form->field($formModel, 'translationSalary[' . $language->id . ']', ['options' => ['class' => 'form-group']])->label(
                $formModel->getAttributeLabel('translationSalary_'.$language->id)
            );?>
        </div>
        <?endforeach;?>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'tax', ['options' => ['class' => 'form-group']])->label(
                $formModel->getAttributeLabel('tax').', % от зарплаты специалиста'
            );?>
        </div>
    </div>
    <div class="row">
        <?foreach($languages as $language):?>
            <div class="col-sm-4">
                <?= $form->field($formModel, 'translationAmortization[' . $language->id . ']', ['options' => ['class' => 'form-group']])->label(
                    $formModel->getAttributeLabel('translationAmortization_'.$language->id)
                );?>
            </div>
        <?endforeach;?>
    </div>
    <div class="row">
        <?foreach($languages as $language):?>
            <div class="col-sm-4">
                <?= $form->field($formModel, 'translationMaintenance[' . $language->id . ']', ['options' => ['class' => 'form-group']])->label(
                    $formModel->getAttributeLabel('translationMaintenance_'.$language->id)
                );?>
            </div>
        <?endforeach;?>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'profit', ['options' => ['class' => 'form-group']])->label(
                $formModel->getAttributeLabel('profit').', % от зарплаты специалиста'
            );?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'usn', ['options' => ['class' => 'form-group']])->label(
                $formModel->getAttributeLabel('usn').', % от суммы всех затрат'
            );?>
        </div>
    </div>
<?php $box->endBody(); ?>
<?php $box->beginFooter(); ?>
<?= Html::submitButton('Сохранить',
    [
        'class' => $model->isNewRecord ? 'btn btn-primary btn-large' : 'btn btn-success btn-large'
    ]
) ?>
<?php $box->endFooter(); ?>
<?php ActiveForm::end(); ?>