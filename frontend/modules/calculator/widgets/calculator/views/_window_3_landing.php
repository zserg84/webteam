<?
use frontend\modules\calculator\widgets\calculator\Asset;
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
use frontend\modules\calculator\Module;
use common\modules\calculator\models\WorkLang;
use common\models\Lang;
?>
<div class="sw-container swc-win-7 transit-1000">
    <div class="btn-back-block transit-300" data-winback="7" data-prev="<?=CalculatorWidget::TYPE_2_WEBSITE?>">
        <div class="arrow-icon">
            <img src="<?=Asset::imgSrc("arrow-back.png")?>" alt="">
        </div>
        <div class="btn-name">
            <?=Module::t('main', 'BUTTON_BACK')?>
        </div>
    </div>
    <div class="swc-title transit-1000">
        <?=Module::t('portal', 'LANDING_TITLE')?>
    </div>
    <div class="swc-content">
        <div class="swc-7-items-block transit-1000">
            <div class="swc-7-context">
                <?=Module::t('portal', 'LANDING_CONTENT_1')?>
            </div>
            <div class="swc-7-context">
                <?=Module::t('portal', 'LANDING_CONTENT_2')?>
                <ul>
                    <li>
                        <span>
                            <?=Module::t('portal', 'LANDING_LIST_1')?>
                        </span>
                    </li>
                    <li>
                        <span>
                            <?=Module::t('portal', 'LANDING_LIST_2')?>
                        </span>
                    </li>
                    <li>
                        <span>
                            <?=Module::t('portal', 'LANDING_LIST_3')?>
                        </span>
                    </li>
                    <li>
                        <span>
                            <?=Module::t('portal', 'LANDING_LIST_4')?>
                        </span>
                    </li>
                </ul>
            </div>
            <div class="swc-7-context">
                <?
                $wl = WorkLang::find()->getCost('landing')->one();
                ?>
                <?=Module::t('portal', 'LANDING_CONTENT_3').' '.Module::t('portal', 'from {n} cost', [
                    'n' => $wl ? number_format($wl->cost, 0, '.', ' ') : null
                ])?>
            </div>
        </div>
    </div>
    <div class="swc-footer transit-1000">
        <div class="swc-7-btn-block">
            <div class="swc-7-button transit-300 swc-item"
                 data-page="<?=CalculatorWidget::FROM_CALCULATOR_LANDING?>"
                 data-next="<?=CalculatorWidget::TYPE_SEND_FORM?>"
                 data-from="<?=CalculatorWidget::TYPE_3_LANDING?>"
                >
                <?=Module::t('main', 'BUTTON_CALCULATION')?>
            </div>
        </div>
    </div>
</div>