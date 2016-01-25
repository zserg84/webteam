<?
use common\models\StatementLetter;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use common\models\StatementInterest;
use yii\helpers\Html;

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
            'placeholder'=>'Представьтесь, пожалуйста',
            'required'=>"required",
            'class'=>'input-cell'
        ])->label(false)->error(false)?>
    </div>
    <div class="form-sector">
        <div class="fs-left-cell rc-required-icon">
            <?=$form->field($model, 'email')->textInput([
                'placeholder'=>'E-mail',
                'required'=>"required",
                'class'=>'input-cell',
//                'type' => 'email',
            ])->label(false)->error(false)?>
        </div>
        <div class="fs-right-cell">
            <?=$form->field($model, 'phone')->textInput([
                'placeholder'=>'Телефон',
                'class'=>'input-cell',
                'type' => 'tel',
            ])->label(false)->error(false)?>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="form-sector rc-required-icon" id="form-sector">
        <?=$form->field($model, 'interest_id')->dropDownList(ArrayHelper::map(StatementInterest::find()->all(), 'id', 'name'), [
            'prompt'=>'Выберите, что интересует',
            'class'=>'cs-select cs-skin-elastic',
//            'required'=>"required",
        ])->label(false)->error(false)?>
    </div>
    <div class="form-sector">
        <?=$form->field($model, 'text')->textarea([
            'placeholder'=>'Текст сообщения ...',
            'class'=>'textarea-cell',
        ])->label(false)?>
    </div>
    <div class="form-sector">
        <?=Html::submitButton('Оставить заявку', [
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