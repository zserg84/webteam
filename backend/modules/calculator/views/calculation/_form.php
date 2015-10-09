<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Lang;
use backend\modules\calculator\models\Work;

?>
<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => true,
//    'enableClientValidation' => true,
    'options' => [
        'id' => 'work_form',
    ]
]); ?>
<?php $box->beginBody(); ?>
    <?
    if(in_array($editRole, ['BEditCalculationCommon', 'BEditCalculationDesign'])){

    }
    else{
        $workQuery = Work::find()->parents()->andWhere([
            '=', 'worktype_id', $formModel->worktypeId,
        ]);
        if(!$model->isNewRecord )
            $workQuery->andWhere([
                '<>', 'id', $model->id,
            ]);
        $works = $workQuery->all();
        ?>
        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($formModel, 'parent_id', ['options' => ['class' => 'form-group']])->dropDownList(ArrayHelper::map($works, 'id', 'title'), [
                    'prompt' => 'Выберите родителя',
                ]);?>
            </div>
        </div>
    <?
    }

    $languages = Lang::find()->all();
    foreach($languages as $language):?>
        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($formModel, 'translationTitle[' . $language->id . ']', ['options' => ['class' => 'form-group']])->textInput()->label(
                    $formModel->getAttributeLabel('translationTitle').', '.$language->name
                );?>
            </div>
        </div>
    <?endforeach;?>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($formModel, 'cost', ['options' => ['class' => 'form-group']]);?>
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