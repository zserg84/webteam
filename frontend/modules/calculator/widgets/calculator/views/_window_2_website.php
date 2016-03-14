<?
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
use frontend\modules\calculator\widgets\calculator\Asset;
use frontend\modules\calculator\Module;
?>
<div class="sw-container swc-win-3 transit-1000">
    <div class="btn-back-block transit-300" data-winback="3" data-prev="<?=CalculatorWidget::TYPE_START?>">
        <div class="arrow-icon">
            <img src="<?=Asset::imgSrc('arrow-back.png')?>" alt="">
        </div>
        <div class="btn-name">
            <?=Module::t('main', 'BUTTON_BACK')?>
        </div>
    </div>
    <div class="swc-title transit-1000">
        <?=Module::t('portal', 'PORTAL_TITLE')?>
    </div>
    <div class="swc-content">
        <div class="swc-3-items-block">

            <div class="swc-3-sub-title">
                <?=Module::t('portal', 'PORTAL_CONTENT')?>
            </div>

            <div class="swc-item swc-3-item transit-1000 swc-3-animate-1" data-next="<?=CalculatorWidget::TYPE_3_LANDING?>">
                <div class="swc-3-item-picture transit-300">
                    <img src="<?=Asset::imgSrc('c-win-3/item-1.jpg')?>" alt="" class="transit-300">
                </div>
                <div class="swc-3-item-name transit-300">
                    <?=Module::t('portal', 'PORTAL_LIST_1')?>
                </div>
            </div>
            <div class="swc-item swc-3-item transit-1000 swc-3-animate-2" data-next="<?=CalculatorWidget::TYPE_3_INTERNET_STORE?>">
                <div class="swc-3-item-picture transit-300">
                    <img src="<?=Asset::imgSrc('c-win-3/item-2.jpg')?>" alt="" class="transit-300">
                </div>
                <div class="swc-3-item-name transit-300">
                    <?=Module::t('portal', 'PORTAL_LIST_2')?>
                </div>
            </div>
            <div class="swc-item swc-3-item transit-1000 swc-3-animate-3" data-next="<?=CalculatorWidget::TYPE_3_CORP_SITE?>">
                <div class="swc-3-item-picture transit-300">
                    <img src="<?=Asset::imgSrc('c-win-3/item-3.jpg')?>" alt="" class="transit-300">
                </div>
                <div class="swc-3-item-name transit-300">
                    <?=Module::t('portal', 'PORTAL_LIST_3')?>
                </div>
            </div>
            <div class="swc-item swc-3-item transit-1000 swc-3-animate-4" data-next="<?=CalculatorWidget::TYPE_3_INTERNET_SERVICE?>">
                <div class="swc-3-item-picture transit-300">
                    <img src="<?=Asset::imgSrc('c-win-3/item-4.jpg')?>" alt="" class="transit-300">
                </div>
                <div class="swc-3-item-name transit-300">
                    <?=Module::t('portal', 'PORTAL_LIST_4')?>
                </div>
            </div>
            <div class="swc-item swc-3-item transit-1000 swc-3-animate-5" data-next="<?=CalculatorWidget::TYPE_3_SOC_NETWORK?>">
                <div class="swc-3-item-picture transit-300">
                    <img src="<?=Asset::imgSrc('c-win-3/item-5.jpg')?>" alt="" class="transit-300">
                </div>
                <div class="swc-3-item-name transit-300">
                    <?=Module::t('portal', 'PORTAL_LIST_5')?>
                </div>
            </div>

        </div>
    </div>
    <div class="swc-footer transit-1000">
        &nbsp;
    </div>
</div>