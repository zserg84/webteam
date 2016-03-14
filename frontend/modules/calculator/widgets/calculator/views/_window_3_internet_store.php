<?
use frontend\modules\calculator\widgets\calculator\Asset;
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
use frontend\modules\calculator\Module;
use common\modules\calculator\models\WorkLang;
?>
<div class="sw-container swc-win-8 transit-1000">
    <div class="btn-back-block transit-300" data-winback="8" data-prev="<?=CalculatorWidget::TYPE_2_WEBSITE?>">
        <div class="arrow-icon">
            <img src="<?=Asset::imgSrc("arrow-back.png")?>" alt="">
        </div>
        <div class="btn-name">
            <?=Module::t('main', 'BUTTON_BACK')?>
        </div>
    </div>
    <div class="swc-title transit-1000">
        <?=Module::t('portal', 'SHOP_TITLE')?>
    </div>
    <div class="swc-content">
        <div class="swc-8-items-block transit-1000">

            <div class="swc-8-item-cell cell-left transit-1000">
                <div class="item-icon">
                    <img src="<?=Asset::imgSrc("c-win-8/item-1.png")?>" alt="">
                </div>
                <div class="item-name">
                    <?=Module::t('portal', 'SHOP_CONTENT_1')?>
                </div>
                <div class="item-price">
                    <?
                    $wl = WorkLang::find()->getCost('internet_store_bitrix')->one();
                    ?>
                    <?=Module::t('portal', 'from {n} cost', [
                        'n' => $wl ? number_format($wl->cost, 0, '.', ' ') : null
                    ])?>
                </div>
                <div class="swc-8-btn-block">
                    <div class="swc-8-button transit-300 swc-item"
                         data-page="<?=CalculatorWidget::FROM_CALCULATOR_INTERNET_STORE_1S?>"
                         data-next="<?=CalculatorWidget::TYPE_SEND_FORM?>"
                         data-from = "<?=CalculatorWidget::TYPE_3_INTERNET_STORE?>"
                        >
                        <?=Module::t('main', 'BUTTON_CALCULATION')?>
                    </div>
                </div>
            </div>

            <div class="swc-8-item-cell cell-right transit-1000">
                <div class="item-icon">
                    <img src="<?=Asset::imgSrc("c-win-8/item-2.png")?>" alt="">
                </div>
                <div class="item-name">
                    <?=Module::t('portal', 'SHOP_CONTENT_3')?>
                </div>
                <div class="item-price">
                    <?
                    $wl = WorkLang::find()->getCost('internet_store_custom')->one();
                    ?>
                    <?=Module::t('portal', 'from {n} cost', [
                        'n' => $wl ? number_format($wl->cost, 0, '.', ' ') : null
                    ])?>
                </div>
                <div class="swc-8-btn-block">
                    <div class="swc-8-button transit-300 swc-item"
                         data-page="<?=CalculatorWidget::FROM_CALCULATOR_INTERNET_STORE_YOURS?>"
                         data-next="<?=CalculatorWidget::TYPE_SEND_FORM?>"
                         data-from = "<?=CalculatorWidget::TYPE_3_INTERNET_STORE?>"
                        >
                        <?=Module::t('main', 'BUTTON_CALCULATION')?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="swc-footer transit-1000">
        &nbsp;
    </div>
</div>