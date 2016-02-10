<?
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
use frontend\modules\calculator\widgets\calculator\Asset;
?>
<div class="sw-container swc-win-4 transit-1000">
    <div class="btn-back-block transit-300" data-winback="4" data-prev="<?=CalculatorWidget::TYPE_START?>">
        <div class="arrow-icon">
            <img src="<?=Asset::imgSrc('arrow-back.png')?>" alt="">
        </div>
        <div class="btn-name">
            Назад
        </div>
    </div>
    <div class="swc-title transit-1000">
        Стоимость мобильного приложения
    </div>
    <div class="swc-content">
        <div class="swc-4-items-block transit-1000">
            <p>
                Стоимость создания мобильного приложения в нашей студии начинается от 250 тысяч рублей.
            </p>
            <p>
                К сожалению, невозможно точно ответить на общий вопрос «сколько стоит мобильное приложение». Конечная цена зависит от требуемого функционала, количества поддерживаемых платформ и желаемой скорости разработки.
            </p>
            <p>
                Оставьте свои координаты и мы оперативно свяжемся с Вами для выяснения всех деталей.
            </p>
        </div>
    </div>
    <div class="swc-footer transit-1000">
        <div class="swc-4-btn-block">
            <div class="swc-4-button transit-300 swc-item"
                 data-page="<?=CalculatorWidget::FROM_CALCULATOR_MOBILE?>"
                 data-next="<?=CalculatorWidget::TYPE_SEND_FORM?>"
                 data-from="<?=CalculatorWidget::TYPE_2_MOBILE?>"
                >
                Получить детальный расчёт
            </div>
        </div>
    </div>
</div>