<?
use frontend\modules\calculator\widgets\calculator\Asset;
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
use yii\bootstrap\ActiveForm;
use common\models\StatementLetter;
use yii\helpers\Url;
use yii\bootstrap\Html;

$model = new StatementLetter();
?>
<div class="sw-container swc-win-13 transit-1000"> <!-- before-choosen -->
    <div class="btn-back-block transit-300"
         data-winback="13"
         data-prev="<?=$from?>"
        >
        <div class="arrow-icon">
            <img src="<?=Asset::imgSrc("arrow-back.png")?>" alt="">
        </div>
        <div class="btn-name">
            Назад
        </div>
    </div>
    <div class="swc-title transit-1000">

        <!--
            Если ранее в окнах юзером выбраны какие-либо пункты, то показываем этот блок
            путем добавления класса "before-choosen" к контейнеру этого окна "swc-win-13"
         -->
        <div class="before-choose-title">
            <div class="bc-title">
                Выбранные пункты и стоимость услуг
            </div>
            <div class="bc-context">
                Всего выбрано 8 пунктов на общую сумму:
            </div>
            <div class="bc-price">
                85 201 <img src="<?=Asset::imgSrc("icon-rub-big.png")?>" alt="" class="icon-rub-big">
            </div>
        </div>
        <!-- -->

        <div class="swc-present-title">
            Оставьте свою контактную информацию
        </div>

    </div>
    <?$form = ActiveForm::begin([
        'id' => 'calculator-form',
        'action' => Url::toRoute(['/site/statement']),
        'enableClientValidation' => false,
        'enableAjaxValidation' => true,
    ])?>
    <?=Html::hiddenInput('hiddenFrom', CalculatorWidget::getFromValue($page))?>
    <?=Html::hiddenInput('scenario', StatementLetter::SCENARIO_CALCULATOR)?>
    <div class="swc-content">
        <div class="swc-13-items-block transit-1000">
            <div class="form-cell">
                <?=$form->field($model, 'fio')->textInput([
                    'placeholder' => 'Как Вас зовут?',
                    'class'=> 'calc-form-input',
                ])->label(false)->error(false)?>
<!--                <input type="text" placeholder="Как Вас зовут?" class="calc-form-input">-->
            </div>
            <div class="form-cell">
                <?=$form->field($model, 'phone')->textInput([
                    'placeholder' => 'Укажите свой сотовый для связи',
                    'class'=> 'calc-form-input',
                ])->label(false)->error(false)?>
<!--                <input type="tel" placeholder="Укажите свой сотовый для связи" class="calc-form-input">-->
            </div>
            <div class="form-cell">
                <?=$form->field($model, 'email')->textInput([
                    'placeholder' => 'Ваш e-mail',
                    'class'=> 'calc-form-input',
//                    'type' => 'email'
                ])->label(false)->error(false)?>
<!--                <input type="email" placeholder="Ваш e-mail" class="calc-form-input">-->
            </div>
            <div class="form-cell">
                <?=$form->field($model, 'text')->textarea([
                    'placeholder' => 'Оставьте свое сообщение с деталями о проекте или вопросы для нас',
                    'class'=> 'calc-form-textarea',
                ])->label(false)->error(false)?>
<!--                <textarea placeholder="Оставьте свое сообщение с деталями о проекте или вопросы для нас" class="calc-form-textarea"></textarea>-->
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