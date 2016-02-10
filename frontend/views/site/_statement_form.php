<?
use common\models\StatementLetter;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use common\models\StatementInterest;
use yii\helpers\Html;
use frontend\components\Helper;

$model = new StatementLetter()?>
<?php $form = ActiveForm::begin([
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'options' => [
        'id' => 'statement_form',
    ],
    'action' => Url::toRoute(['/site/statement/'])
]); ?>
    <?=Html::hiddenInput('hiddenFrom', StatementLetter::getFromValue(StatementLetter::FROM_MAIN))?>
    <div class="form-sector rc-required-icon">
        <?=$form->field($model, 'fio')->textInput([
            'placeholder'=>Helper::t('main', 'FORM_NAME'),
            'class'=>'input-cell'
        ])->label(false)?>
    </div>
    <div class="form-sector">
        <div class="fs-left-cell rc-required-icon">
            <?=$form->field($model, 'email')->textInput([
                'placeholder'=>Helper::t('main', 'FORM_EMAIL'),
                'class'=>'input-cell',
//                'type' => 'email',
            ])->label(false)?>
        </div>
        <div class="fs-right-cell">
            <?=$form->field($model, 'phone')->textInput([
                'placeholder'=>Helper::t('main', 'FORM_PHONE'),
                'class'=>'input-cell',
                'type' => 'tel',
            ])->label(false)?>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="form-sector rc-required-icon" id="form-sector">
        <?=$form->field($model, 'interest_id')->dropDownList(ArrayHelper::map(StatementInterest::find()->all(), 'id', 'name'), [
            'prompt' => Helper::t('main', 'FORM_SELECT'),
            'class'=>'cs-select cs-skin-elastic',
        ])->label(false)?>
    </div>
    <div class="form-sector">
        <?=$form->field($model, 'text')->textarea([
            'placeholder' => Helper::t('main', 'FORM_MESSAGE'),
            'class'=>'textarea-cell',
        ])->label(false)?>
    </div>
    <div class="form-sector">
        <?=Html::submitButton(Helper::t('main', 'ORDER_BUTTON'), [
            'class' => 'button-cell transit-300',
        ])?>
    </div>
<?ActiveForm::end()?>

<?
$this->registerJS('
    $(document).on("submit", "#statement_form", function(){
		yaCounter23517844.reachGoal("form_send");
    });
');
//$this->registerJS('
//    $(document).on("submit", "#statement_form", function(){
//        var data = $(this).serialize();
//        $.post($(this).attr("action"), data, function(data){
//            if(data == true){
//                $(".send-message-container").addClass("sm-show");
//            }
//        });
//        return false;
//    });
//');