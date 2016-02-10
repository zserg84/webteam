<?
use frontend\modules\calculator\widgets\calculator\Asset;
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
use yii\bootstrap\ActiveForm;
use frontend\modules\calculator\models\form\EmailForm;
use yii\helpers\Url;
use yii\bootstrap\Html;

$model = isset($model) ? $model : new EmailForm();
?>
<div class="sw-container swc-win-13 transit-1000"> <!-- before-choosen -->
    <div class="btn-back-block transit-300" data-prev="<?=$from?>">
        <div class="arrow-icon">
            <img src="<?=Asset::imgSrc("arrow-back.png")?>" alt="">
        </div>
        <div class="btn-name">
            Назад
        </div>
    </div>
    <div class="swc-title transit-1000">
        <div class="swc-present-title">
            Оставьте свою контактную информацию
        </div>
    </div>
    <?$form = ActiveForm::begin([
        'options' => [
            'id' => 'calculator_email_form',
        ],
        'action' => Url::toRoute(['/calculator/default/email-form', 'page'=>$page, 'data'=>$data]),
        'enableClientValidation' => true,
        'enableAjaxValidation' => true,
    ])?>
    <div class="swc-content">
        <div class="swc-13-items-block transit-1000">
            <div class="form-cell">
                <?=$form->field($model, 'email')->textInput([
                    'placeholder'=>'E-mail',
                    'required'=>"required",
                    'class'=>'calc-form-input',
//                'type' => 'email',
                ])->label(false)->error(false)?>
<!--                <input type="email" placeholder="Ваш e-mail" class="calc-form-input" name="EmailForm[email]" value="--><?//=$model->email?><!--">-->
            </div>
        </div>
    </div>
    <div class="swc-footer transit-1000">
        <div class="swc-13-btn-block">
            <div class="swc-13-button transit-300 submit-button">
                Отправить запрос
            </div>
        </div>
    </div>
    <?ActiveForm::end()?>
</div>