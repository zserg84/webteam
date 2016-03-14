<?
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
use frontend\modules\calculator\widgets\calculator\Asset;
use frontend\modules\calculator\Module;
?>
<div class="sw-container swc-win-1 transit-1000">
    <div class="swc-title transit-1000">
        <?=Module::t('main', 'MAIN_TITLE')?>
    </div>
    <div class="swc-content">
        <div class="swc-1-items-block">
            <div class="swc-item swc-1-item swc-1-animate-left transit-1000" data-next="<?=CalculatorWidget::TYPE_2_DESIGN_FIRSTYLE?>">
                <div class="swc-1-item-picture transit-300">
                    <img src="<?=Asset::imgSrc('c-win-1/item-1.jpg')?>" alt="" class="transit-300">
                </div>
                <div class="swc-1-item-name transit-300">
                    <?=Module::t('main', 'MAIN_LINK_1')?>
                </div>
            </div>
            <div class="swc-item swc-1-item item-1-margin transit-1000" data-next="<?=CalculatorWidget::TYPE_2_WEBSITE?>">
                <div class="swc-1-item-picture transit-300">
                    <img src="<?=Asset::imgSrc('c-win-1/item-2.jpg')?>" alt="" class="transit-300">
                </div>
                <div class="swc-1-item-name transit-300">
                    <?=Module::t('main', 'MAIN_LINK_2')?>
                </div>
            </div>
            <div class="swc-item swc-1-item swc-1-animate-right transit-1000" data-next="<?=CalculatorWidget::TYPE_2_MOBILE?>">
                <div class="swc-1-item-picture transit-300">
                    <img src="<?=Asset::imgSrc('c-win-1/item-3.jpg')?>" alt="" class="transit-300">
                </div>
                <div class="swc-1-item-name transit-300">
                    <?=Module::t('main', 'MAIN_LINK_3')?>
                </div>
            </div>
        </div>
    </div>
    <div class="swc-footer transit-1000">
        <div class="swc-1-btn-block">
            <div class="swc-1-button transit-300 swc-item" data-next="<?=CalculatorWidget::TYPE_CALCULATION?>">
                <?=Module::t('main', 'MAIN_BUTTON')?>
            </div>
        </div>
        <div class="swc-1-sub-text">
            <?=Module::t('main', 'MAIN_CONTENT')?>
        </div>
    </div>
</div>