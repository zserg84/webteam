<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\fileinput\BootstrapFileInput;
use common\models\Lang;
use vova07\imperavi\Widget as Imperavi;
?>
<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => true,
    'enableClientValidation' => false,
    'options' => [
        'id' => 'recall_form',
        'enctype' => 'multipart/form-data',
    ]
]); ?>
<?php $box->beginBody(); ?>

    <?
    $languages = Lang::find()->all();
    foreach($languages as $language):?>
        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($formModel, 'translationMember[' . $language->id . ']', ['options' => ['class' => 'form-group']])->textInput()->label(
                    $formModel->getAttributeLabel('translationMember').', '.$language->name
                );?>
            </div>
        </div>
    <?endforeach;?>
    <?foreach($languages as $language):?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'translationCompany[' . $language->id . ']', ['options' => ['class' => 'form-group']])->textInput()->label(
                $formModel->getAttributeLabel('translationCompany').', '.$language->name
            );?>
        </div>
    </div>
    <?endforeach;?>
    <?foreach($languages as $language):?>
        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($formModel, 'translationText[' . $language->id . ']', ['options' => ['class' => 'form-group']])->widget(
                    Imperavi::className(),
                    [
                        'settings' => [
                            'minHeight' => 200,
                        ]
                    ]
                )->label(
                    $formModel->getAttributeLabel('translationText').', '.$language->name
                );?>
            </div>
        </div>
    <?endforeach;?>

    <div class="row">
        <div class="col-sm-6">
            <?
            $initialPreview = [];
            $previewConfig = [];
            if($formModel->image_cover){
                $initialPreview[] = '<img src="'.$formModel->image_cover->getSrc().'" alt="" class="file-preview-image">';
                $previewConfig[] = [
//                    'url' => Url::toRoute(['image-delete']),
//                    'key' => $formModel->image_cover->id,
                ];
            }
            ?>
            <?= $form->field($formModel, 'image_cover')->widget(BootstrapFileInput::className(), [
                'options' => ['accept' => 'image/*'],
                'clientOptions' => [
                    'browseClass' => 'btn btn-success',
                    'uploadClass' => 'btn btn-info',
                    'removeClass' => 'btn btn-danger',
                    'removeIcon' => '<i class="glyphicon glyphicon-trash"></i> ',
                    'showUpload' => false,
                    'initialPreview' => $initialPreview,
                    'initialPreviewConfig' => $previewConfig,
                    'showRemove' => false,
                ]
            ])->error(false);?>
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