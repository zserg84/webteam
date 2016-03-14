<?
use frontend\modules\calculator\widgets\calculator\Asset;
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
use frontend\modules\calculator\Module;
?>
<div class="sw-container swc-win-10 transit-1000">
    <div class="btn-back-block transit-300" data-winback="10" data-prev="<?=CalculatorWidget::TYPE_2_WEBSITE?>">
        <div class="arrow-icon">
            <img src="<?=Asset::imgSrc("arrow-back.png")?>" alt="">
        </div>
        <div class="btn-name">
            <?=Module::t('main', 'BUTTON_BACK')?>
        </div>
    </div>
    <div class="swc-title transit-1000">
        <?=Module::t('portal', 'SERVICE_TITLE')?>
    </div>
    <div class="swc-content">
        <div class="swc-10-items-block transit-1000">
            <p>
                <?=Module::t('portal', 'SERVICE_CONTENT_1')?>
            </p>
            <p>
                <?=Module::t('portal', 'SERVICE_CONTENT_2')?>
            </p>
            <p>
                <?=Module::t('portal', 'SERVICE_CONTENT_3')?>
            </p>
            <p>
                <?=Module::t('portal', 'SERVICE_CONTENT_4')?>
            </p>
        </div>
    </div>
    <div class="swc-footer transit-1000">
        <div class="swc-10-btn-block">
            <div class="swc-10-button transit-300 win-moving14 swc-item"
                 data-next="<?=CalculatorWidget::TYPE_CALCULATION?>"
                 data-from="<?=CalculatorWidget::TYPE_3_INTERNET_SERVICE?>"
                >
                <?=Module::t('main', 'BUTTON_SELF_CALCULATION')?>
            </div>
            <div class="swc-10-button transit-300 swc-item"
                 data-page="<?=CalculatorWidget::FROM_CALCULATOR_INTERNET_SERVICE?>"
                 data-next="<?=CalculatorWidget::TYPE_SEND_FORM?>"
                 data-from="<?=CalculatorWidget::TYPE_3_INTERNET_SERVICE?>"
                >
                <?=Module::t('main', 'BUTTON_CALCULATION')?>
            </div>
        </div>
    </div>
</div>