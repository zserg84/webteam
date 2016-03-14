<?
use frontend\modules\calculator\widgets\calculator\Asset;
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
use frontend\modules\calculator\Module;
?>
<div class="sw-container swc-win-11 transit-1000">
    <div class="btn-back-block transit-300" data-winback="11"  data-prev="<?=CalculatorWidget::TYPE_2_WEBSITE?>">
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
        <div class="swc-11-items-block transit-1000">
            <div class="swc-11-context">
                <?=Module::t('portal', 'NETWORK_CONTENT_1')?>
            </div>
            <div class="swc-11-context">
                <?=Module::t('portal', 'NETWORK_CONTENT_2')?>
                <ul>
                    <li>

                        <div class="social-description">
                            <div class="sd-check-block">
                                <input type="checkbox" id="social-check-1">
                                <label for="social-check-1"></label>
                            </div>
                            <div class="sd-check-context">
                                <?=Module::t('portal', 'NETWORK_LIST_1')?>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </li>
                    <li>

                        <div class="social-description sd-bg-second">
                            <div class="sd-check-block">
                                <input type="checkbox" id="social-check-2">
                                <label for="social-check-2"></label>
                            </div>
                            <div class="sd-check-context">
                                <?=Module::t('portal', 'NETWORK_LIST_2')?>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </li>
                    <li>

                        <div class="social-description">
                            <div class="sd-check-block">
                                <input type="checkbox" id="social-check-3">
                                <label for="social-check-3"></label>
                            </div>
                            <div class="sd-check-context">
                                <?=Module::t('portal', 'NETWORK_LIST_3')?>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="swc-footer transit-1000">
        <div class="swc-11-btn-block">
            <div class="swc-11-button btn-disable transit-300 swc-item"
                 data-next="<?=CalculatorWidget::TYPE_4_SOC_NETWORK?>">
                <?=Module::t('portal', 'NETWORK_BUTTON')?>
            </div>
        </div>
    </div>
</div>