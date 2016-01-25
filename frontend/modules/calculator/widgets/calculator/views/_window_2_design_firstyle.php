<?
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
use frontend\modules\calculator\widgets\calculator\Asset;
?>
<div class="sw-container swc-win-2 transit-1000">
    <div class="btn-back-block transit-300" data-winback="2" data-prev="<?=CalculatorWidget::TYPE_START?>">
        <div class="arrow-icon">
            <img src="<?=Asset::imgSrc('arrow-back.png')?>" alt="">
        </div>
        <div class="btn-name">
            Назад
        </div>
    </div>
    <div class="swc-title transit-1000">
        Выберите один из пунктов чтобы узнать стоимость проекта
    </div>
    <div class="swc-content">
        <div class="swc-2-items-block">
            <div class="swc-item swc-2-item swc-2-animate-left transit-1000" data-next="<?=CalculatorWidget::TYPE_3_FIRSTYLE?>">
                <div class="swc-2-item-picture transit-300">
                    <img src="<?=Asset::imgSrc('c-win-2/item-1.jpg')?>" alt="" class="transit-300">
                </div>
                <div class="swc-2-item-name transit-300">
                    Фирстиль и айдентика
                </div>
            </div>
            <div class="swc-item swc-2-item swc-2-animate-right transit-1000" data-next="<?=CalculatorWidget::TYPE_3_DESIGN?>">
                <div class="swc-2-item-picture transit-300">
                    <img src="<?=Asset::imgSrc('c-win-2/item-2.jpg')?>" alt="" class="transit-300">
                </div>
                <div class="swc-2-item-name transit-300">
                    Дизайн страниц сайта
                </div>
            </div>
        </div>
    </div>
    <div class="swc-footer transit-1000">
        &nbsp;
    </div>
</div>