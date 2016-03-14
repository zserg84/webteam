<?
use frontend\modules\calculator\widgets\calculator\Asset;
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
use frontend\modules\calculator\Module;
use common\modules\calculator\models\WorkLang;
?>
<div class="sw-container swc-win-12 transit-1000">
    <div class="btn-back-block transit-300" data-winback="12"  data-prev="<?=CalculatorWidget::TYPE_3_SOC_NETWORK?>">
        <div class="arrow-icon">
            <img src="<?=Asset::imgSrc("arrow-back.png")?>" alt="">
        </div>
        <div class="btn-name">
            <?=Module::t('main', 'BUTTON_BACK')?>
        </div>
    </div>
    <div class="swc-title transit-1000">
        <?=Module::t('portal', 'NETWORK_TITLE')?>
    </div>
    <div class="swc-content">
        <div class="swc-12-items-block transit-1000">
            <p>
                <?=Module::t('portal', 'NETWORK_CONTENT_3')?>
                <?
                $wl = WorkLang::find()->getCost('soc_network')->one();
                ?>
                <?=Module::t('portal', 'from {n} cost', [
                    'n' => $wl ? number_format($wl->cost, 0, '.', ' ') : null
                ])?>
            </p>
            <p>
                <?=Module::t('portal', 'NETWORK_CONTENT_4')?>
            </p>
        </div>
    </div>
    <div class="swc-footer transit-1000">
        <div class="swc-12-btn-block">
            <div class="swc-12-button transit-300 win-moving14 swc-item"
                 data-next="<?=CalculatorWidget::TYPE_CALCULATION?>"
                 data-from="<?=CalculatorWidget::TYPE_4_SOC_NETWORK?>"
                >
                <?=Module::t('main', 'BUTTON_SELF_CALCULATION')?>
            </div>
            <div class="swc-12-button transit-300 swc-item"
                 data-page="<?=CalculatorWidget::FROM_CALCULATOR_SOC_NETWORK?>"
                 data-next="<?=CalculatorWidget::TYPE_SEND_FORM?>"
                 data-from="<?=CalculatorWidget::TYPE_4_SOC_NETWORK?>"
                >
                <?=Module::t('main', 'BUTTON_CALCULATION')?>
            </div>
        </div>
    </div>
</div>