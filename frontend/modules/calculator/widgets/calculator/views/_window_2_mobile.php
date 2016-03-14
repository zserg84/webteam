<?
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
use frontend\modules\calculator\widgets\calculator\Asset;
use frontend\modules\calculator\Module;
use common\modules\calculator\models\WorkLang;
?>
<div class="sw-container swc-win-4 transit-1000">
    <div class="btn-back-block transit-300" data-winback="4" data-prev="<?=CalculatorWidget::TYPE_START?>">
        <div class="arrow-icon">
            <img src="<?=Asset::imgSrc('arrow-back.png')?>" alt="">
        </div>
        <div class="btn-name">
            <?=Module::t('main', 'BUTTON_BACK')?>
        </div>
    </div>
    <div class="swc-title transit-1000">
        <?=Module::t('portal', 'MOBILE_TITLE')?>
    </div>
    <div class="swc-content">
        <div class="swc-4-items-block transit-1000">
            <p>
                <?=Module::t('portal', 'MOBILE_CONTENT_1')?>
            </p>
            <p>
                <?=Module::t('portal', 'MOBILE_CONTENT_2')?>
                <?
                $wl = WorkLang::find()->getCost('mobile')->one();
                ?>
                <?=Module::t('portal', 'from {n} cost', [
                    'n' => $wl ? number_format($wl->cost, 0, '.', ' ') : null
                ])?>
            </p>
            <p>
                <?=Module::t('portal', 'MOBILE_CONTENT_3')?>
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
                <?=Module::t('main', 'BUTTON_CALCULATION')?>
            </div>
        </div>
    </div>
</div>