<?
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?
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
        Записаться на собеседование
    </div>
    <div class="ppd-in-form">
        <?=Html::hiddenInput('hiddenVacancy', '', [
            'id' => 'hiddenVacancy'
        ])?>
        <?=$form->field($model, 'fio')->textInput([
            'placeholder'=>'Ваше имя',
            'required'=>"required",
            'class'=>'in-put'
        ])->label(false)->error(false)?>
        <?=$form->field($model, 'phone')->textInput([
            'placeholder'=>'Телефон',
            'class'=>'in-put',
            'type' => 'phone',
            'required' => 'required',
        ])->label(false)->error(false)?>
        <?=$form->field($model, 'email')->textInput([
            'placeholder'=>'E-mail',
            'required'=>"required",
            'class'=>'in-put',
            'type' => 'email',
        ])->label(false)->error(false)?>
    </div>
    <div class="btn-container">
        <div class="btn-container">
            <button class="btn-vacancy">Записаться на собеседование</button>
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