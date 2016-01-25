<?
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
use frontend\modules\calculator\widgets\calculator\Asset;

?>
<div class="sw-container swc-win-1 transit-1000">
    <div class="swc-title transit-1000">
        Выберите один из пунктов чтобы узнать стоимость Вашего проекта
    </div>
    <div class="swc-content">
        <div class="swc-1-items-block">
            <div class="swc-item swc-1-item swc-1-animate-left transit-1000" data-next="<?=CalculatorWidget::TYPE_2_DESIGN_FIRSTYLE?>">
                <div class="swc-1-item-picture transit-300">
                    <img src="<?=Asset::imgSrc('c-win-1/item-1.jpg')?>" alt="" class="transit-300">
                </div>
                <div class="swc-1-item-name transit-300">
                    Дизайн, фирстиль и айдентика
                </div>
            </div>
            <div class="swc-item swc-1-item item-1-margin transit-1000" data-next="<?=CalculatorWidget::TYPE_2_WEBSITE?>">
                <div class="swc-1-item-picture transit-300">
                    <img src="<?=Asset::imgSrc('c-win-1/item-2.jpg')?>" alt="" class="transit-300">
                </div>
                <div class="swc-1-item-name transit-300">
                    Веб сайт, портал<br>или сервис
                </div>
            </div>
            <div class="swc-item swc-1-item swc-1-animate-right transit-1000" data-next="<?=CalculatorWidget::TYPE_2_MOBILE?>">
                <div class="swc-1-item-picture transit-300">
                    <img src="<?=Asset::imgSrc('c-win-1/item-3.jpg')?>" alt="" class="transit-300">
                </div>
                <div class="swc-1-item-name transit-300">
                    Мобильное приложение
                </div>
            </div>
        </div>
    </div>
    <div class="swc-footer transit-1000">
        <div class="swc-1-btn-block">
            <div class="swc-1-button transit-300 swc-item" data-next="<?=CalculatorWidget::TYPE_CALCULATION?>">
                Я знаю состав необходимой мне команды
            </div>
        </div>
        <div class="swc-1-sub-text">
            расчет помесячной стоимости IT специалистов
        </div>
    </div>
</div>