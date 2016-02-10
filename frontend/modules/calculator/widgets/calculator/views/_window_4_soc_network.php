<?
use frontend\modules\calculator\widgets\calculator\Asset;
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
?>
<div class="sw-container swc-win-12 transit-1000">
    <div class="btn-back-block transit-300" data-winback="12"  data-prev="<?=CalculatorWidget::TYPE_3_SOC_NETWORK?>">
        <div class="arrow-icon">
            <img src="<?=Asset::imgSrc("arrow-back.png")?>" alt="">
        </div>
        <div class="btn-name">
            Назад
        </div>
    </div>
    <div class="swc-title transit-1000">
        Стоимость социальной сети
    </div>
    <div class="swc-content">
        <div class="swc-12-items-block transit-1000">
            <p>
                Стоимость создания социальной сети в нашей студии начинается от 3 миллионов рублей.
            </p>
            <p>
                Оставьте свои координаты и мы оперативно свяжемся с Вами для выяснения всех деталей.
            </p>
        </div>
    </div>
    <div class="swc-footer transit-1000">
        <div class="swc-12-btn-block">
            <div class="swc-12-button transit-300 win-moving14 swc-item"
                 data-next="<?=CalculatorWidget::TYPE_CALCULATION?>"
                 data-from="<?=CalculatorWidget::TYPE_4_SOC_NETWORK?>"
                >
                Посчитать команду самому
            </div>
            <div class="swc-12-button transit-300 swc-item"
                 data-page="<?=CalculatorWidget::FROM_CALCULATOR_SOC_NETWORK?>"
                 data-next="<?=CalculatorWidget::TYPE_SEND_FORM?>"
                 data-from="<?=CalculatorWidget::TYPE_4_SOC_NETWORK?>"
                >
                Получить детальный расчёт
            </div>
        </div>
    </div>
</div>