<?
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use frontend\components\Helper;
?>

<?
$model = new \common\models\StatementLetter();
$form = ActiveForm::begin([
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'options' => [
        'id' => 'statement_form',
    ],
    'action' => Url::toRoute(['/service/statement/'])
])?>
    <div class="ppd-form-title">
        <?=Helper::t('ourservices_form', 'SERVICE_TITLE')?>
    </div>
    <div class="ppd-in-form">
        <?=Html::hiddenInput('hiddenService', null, [
            'id' => 'hiddenService'
        ])?>
        <?=$form->field($model, 'fio')->textInput([
            'placeholder'=>Helper::t('ourservices_form', 'FORM_NAME'),
            'class'=>'in-put'
        ])->label(false)?>
        <?=$form->field($model, 'phone')->textInput([
            'placeholder'=>Helper::t('ourservices_form', 'FORM_PHONE'),
            'class'=>'in-put',
            'type' => 'phone',
        ])->label(false)?>
        <?=$form->field($model, 'email')->textInput([
            'placeholder'=>Helper::t('ourservices_form', 'FORM_EMAIL'),
            'class'=>'in-put',
//            'type' => 'email',
        ])->label(false)?>
    </div>
    <div class="btn-container">
        <button class="btn-order"><?=Helper::t('ourservices_form', 'SERVICE_BUTTON')?></button>
    </div>
<?ActiveForm::end()?>

<?//$this->registerJS('
//    $(document).on("submit", "#statement_form", function(){
//        var data = $(this).serialize();
//        var form = this;
//        $.post($(this).attr("action"), data, function(data){
//            if(data == true){
//                $( ".close-button" ).trigger( "click" );
//                $(".send-message-container").addClass("sm-show");
//                $(form).trigger("reset");
//            }
//        });
//        return false;
//    });
//');