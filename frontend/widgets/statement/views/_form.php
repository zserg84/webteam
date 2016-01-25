<?
use yii\bootstrap\ActiveForm;
use common\models\StatementInterest;
use common\models\StatementLetter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="fly-button-great">
    <div class="fbg-name"></div>
</div>
<div class="fly-form-container">
    <div class="ffc-btn-close transit-300"></div>
    <div class="ffc-title">
        Оставить заявку
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
                    'placeholder'=>'Представьтесь пожалуйста',
                    'required'=>"required",
                    'class'=>'fly-form-input'
                ])->label(false)->error(false)?>
            </div>
            <div class="ffc-cell rc-required-icon">
                <?=$form->field($model, 'email')->textInput([
                    'placeholder'=>'E-mail',
                    'required'=>"required",
                    'class'=>'fly-form-input'
                ])->label(false)->error(false)?>
            </div>
            <div class="ffc-cell">
                <?=$form->field($model, 'phone')->textInput([
                    'placeholder'=>'Телефон',
                    'class'=>'fly-form-input'
                ])->label(false)->error(false)?>
            </div>
            <div class="ffc-cell rc-required-icon">
                <?=$form->field($model, 'interest_id')->dropDownList(ArrayHelper::map(StatementInterest::find()->all(), 'id', 'name'), [
                    'prompt'=>'Выберите что интересует',
                    'class'=>'cs-select cs-skin-elastic',
//                    'required'=>"required",
                ])->label(false)->error(false)?>
            </div>
            <div class="ffc-cell-button">
                <?=Html::submitButton('Оставить заявку', [
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