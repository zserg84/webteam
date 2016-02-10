<?
use yii\bootstrap\ActiveForm;
use common\models\StatementInterest;
use common\models\StatementLetter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\components\Helper;

$lang = \common\models\Lang::getCurrent();
$class = '';
if($lang->url == 'en')
    $class = 'en';
?>
<div class="fly-button-great">
    <div class="fbg-name <?=$class?>"></div>
</div>
<div class="fly-form-container">
    <div class="ffc-btn-close transit-300"></div>
    <div class="ffc-title">
        <?=Helper::t('flyform', 'ORDER_BUTTON')?>
    </div>
    <div class="ffc-content">
        <?php $form = ActiveForm::begin([
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
            'options' => [
                'id' => 'fly_statement_form',
            ],
            'action' => Url::toRoute(['/site/statement/'])
        ]); ?>
        <?=Html::hiddenInput('hiddenFrom', $from)?>
            <div class="ffc-cell rc-required-icon">
                <?=$form->field($model, 'fio')->textInput([
                    'placeholder'=>Helper::t('flyform', 'FORM_NAME'),
                    'class'=>'fly-form-input'
                ])->label(false)->error(false)?>
            </div>
            <div class="ffc-cell rc-required-icon">
                <?=$form->field($model, 'email')->textInput([
                    'placeholder'=>Helper::t('flyform', 'FORM_EMAIL'),
                    'class'=>'fly-form-input'
                ])->label(false)->error(false)?>
            </div>
            <div class="ffc-cell">
                <?=$form->field($model, 'phone')->textInput([
                    'placeholder'=>Helper::t('flyform', 'FORM_PHONE'),
                    'class'=>'fly-form-input'
                ])->label(false)->error(false)?>
            </div>
            <div class="ffc-cell rc-required-icon">
                <?=$form->field($model, 'interest_id')->dropDownList(ArrayHelper::map(StatementInterest::find()->all(), 'id', 'name'), [
                    'prompt'=>Helper::t('flyform', 'FORM_SELECT'),
                    'class'=>'cs-select cs-skin-elastic',
                ])->label(false)->error(false)?>
            </div>
            <div class="ffc-cell-button">
                <?=Html::submitButton(Helper::t('flyform', 'ORDER_BUTTON'), [
                    'class' => 'fly-btn-form',
                ])?>
            </div>
        <?ActiveForm::end()?>
    </div>
</div>

<?
$this->registerJS('
    $(document).on("submit", "#fly_statement_form", function(){
		yaCounter23517844.reachGoal("form_send");
    });
');
$this->registerJS('
//    $(document).on("submit", "#fly_statement_form", function(){
//        var data = $(this).serialize();
//        $.post($(this).attr("action"), data, function(data){
//            if(data == true){
//                $( ".ffc-btn-close" ).trigger( "click" );
//                $(".send-message-container").addClass("sm-show");
//            }
//        });
//        return false;
//    });
');