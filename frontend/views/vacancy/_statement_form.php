<?
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use frontend\components\Helper;

$model = new \common\models\StatementLetter();
$form = ActiveForm::begin([
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'options' => [
        'id' => 'statement_form',
    ],
    'action' => Url::toRoute(['/vacancy/statement/'])
])?>
    <div class="ppd-form-title">
        <?=Helper::t('vacancy', 'FORM_TITLE')?>
    </div>
    <div class="ppd-in-form">
        <?=Html::hiddenInput('hiddenVacancy', '', [
            'id' => 'hiddenVacancy'
        ])?>
        <?=$form->field($model, 'fio')->textInput([
            'placeholder'=>Helper::t('vacancy', 'FORM_NAME'),
            'class'=>'in-put'
        ])->label(false)?>
        <?=$form->field($model, 'phone')->textInput([
            'placeholder'=>Helper::t('vacancy', 'FORM_PHONE'),
            'class'=>'in-put',
            'type' => 'phone',
        ])->label(false)?>
        <?=$form->field($model, 'email')->textInput([
            'placeholder'=>Helper::t('vacancy', 'FORM_EMAIL'),
            'class'=>'in-put',
            'type' => 'email',
        ])->label(false)?>
    </div>
    <div class="btn-container">
        <div class="btn-container">
            <button class="btn-vacancy"><?=Helper::t('vacancy', 'FORM_BUTTON')?></button>
        </div>
    </div>
<?ActiveForm::end()?>


<?$this->registerJS('
//    $("#statement_form").on("submit", function(){
//        var data = $(this).serialize();
//        $.post($(this).attr("action"), data, function(data){
//            if(data==true){
//                $( ".close-button" ).trigger( "click" );
//                $(".send-message-container").addClass("sm-show");
//            }
//        });
//        return false;
//    });
');