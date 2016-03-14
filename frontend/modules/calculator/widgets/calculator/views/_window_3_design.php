<?
use frontend\modules\calculator\widgets\calculator\Asset;
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
use backend\modules\calculator\models\Work;
use common\modules\calculator\models\Worktype;
use frontend\modules\calculator\Module;

$works = Work::find()->where([
    'worktype_id' => Worktype::TYPE_DESIGN,
    'parent_id' => null,
])->all();
?>
<div class="sw-container swc-win-6 transit-1000">
    <div class="btn-back-block transit-300" data-winback="6" data-prev="<?=CalculatorWidget::TYPE_2_DESIGN_FIRSTYLE?>">
        <div class="arrow-icon">
            <img src="<?=Asset::imgSrc('arrow-back.png')?>" alt="">
        </div>
        <div class="btn-name">
            <?=Module::t('main', 'BUTTON_BACK')?>
        </div>
    </div>
    <div class="swc-title transit-1000">
        <?=Module::t('design', 'SITE_TITLE')?>
    </div>
    <div class="swc-content">
        <div class="swc-6-items-block transit-1000">
            <div class="swc-6-title-name">
                <div class="tn-left">
                    <?=Module::t('design', 'SITE_TABLE_1')?>
                </div>
                <div class="tn-right">
                    <?=Module::t('design', 'SITE_TABLE_3')?>, <img src="<?=Asset::imgSrc(Module::t('main', 'SITE_CURRENCY_SMALL'))?>" alt="" class="icon-rub-small">
                </div>
                <div class="tn-match-name">
                    <?=Module::t('design', 'SITE_TABLE_2')?>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="swc-6-price-content">
                <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                <div class="viewport">
                    <div class="overview swc-6-overview">
                        <?foreach($works as $k=>$work):?>
                            <div class="item-swc-6 item-block">
                                <div class="item-title">
                                    <div class="item-title-name">
                                        <input type="checkbox" id="check-ds-<?=$k?>" data-id="<?=$work->id?>" checked>
                                        <label for="check-ds-<?=$k?>">
                                            <span class="it-name"><?=$work->title?></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="item-price" data-price="<?=$work->cost?>">
                                    <?=number_format($work->cost, 0, '.', ' ');?>
                                </div>
                                <div class="item-quantity">
                                    <div class="btn-qty qty-min transit-300">
                                        &nbsp;
                                    </div>
                                    <div class="desk-qty">
                                        0
                                    </div>
                                    <div class="btn-qty qty-max transit-300">
                                        &nbsp;
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        <?endforeach?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="swc-footer transit-1000">
        <div class="swc-5-footer-title">
            <?=Module::t('design', 'SITE_TOTAL')?> <span id="itog">0</span> <img src="<?=Asset::imgSrc(Module::t('main', 'SITE_CURRENCY_BIG'))?>" alt="" class="icon-rub-big">
        </div>
        <div class="swc-5-footer-content">
            <div class="swc-5-footer-btn transit-300" id="print_button">
                <a data-pjax="0" href="#" data-href="<?=\yii\helpers\Url::toRoute(['/calculator/default/print-page', 'page'=>CalculatorWidget::FROM_CALCULATOR_DESIGN])?>" target="_blank">
                    <?=Module::t('main', 'BUTTON_PRINT')?>
                </a>
            </div>
            <div class="swc-5-footer-btn transit-300" id="sendtoemail"
                 data-page="<?=CalculatorWidget::FROM_CALCULATOR_DESIGN?>"
                 data-next="<?=CalculatorWidget::TYPE_SEND_EMAIL_FORM?>"
                 data-from="<?=CalculatorWidget::TYPE_3_DESIGN?>"
                >
                <?=Module::t('main', 'BUTTON_TO_EMAIL')?>
            </div>
            <div class="swc-5-footer-btn transit-300 swc-item"
                 data-page="<?=CalculatorWidget::FROM_CALCULATOR_DESIGN?>"
                 data-next="<?=CalculatorWidget::TYPE_SEND_FORM?>"
                 data-from="<?=CalculatorWidget::TYPE_3_DESIGN?>"
                >
                <?=Module::t('main', 'BUTTON_DISCOUNT')?>
            </div>
        </div>
    </div>
</div>

<?$this->registerJs('
    function calcItog(){
        var itog = 0;
        $(".item-title input[type=checkbox]:checked").each(function(){
            var count = $(this).closest(".item-block").find(".desk-qty").html();
            count = count != undefined ? count : 1;
            var price = $(this).closest(".item-block").find(".item-price").data("price");
            itog += price*count;
        });
        itog = String(itog);
        itog = itog.replace(/(\d)(?=(\d{3})+(\D|$))/g, "$1 ");
        $("#itog").html(itog);
    }

    calcItog();

    $(document).on("change", ".item-title input[type=checkbox]", function(){
        calcItog();
    });
    $(document).on("click", ".btn-qty", function(){
        calcItog();
    });

    $(document).on("click", "#sendtoemail", function(){
        if($(this).hasClass("btn-disable"))
            return;
        var checks = [];
        $(".item-title input[type=checkbox]:checked").each(function(){
            var count = $(this).closest(".item-block").find(".desk-qty").html();
            count = count != undefined ? count : 1;
            checks[checks.length] = [$(this).data("id"), count];
        });

        var next = $(this).data("next");
        var page = $(this).data("page");
        var from = $(this).data("from");
        $.pjax.reload("#pjax-calculator-container", {
            "type": "GET",
            "data": {calculator_type: next, page: page, data:checks, from:from},
            "push": false,
            "replace": false
        });
    });

    $(document).on("click", "#print_button a", function(){
        var checksStr = "";
        $(".item-title input[type=checkbox]:checked").each(function(){
            var count = $(this).closest(".item-block").find(".desk-qty").html();
            count = count != undefined ? count : 1;
            checksStr += "&subworks[]=" + [$(this).data("id"), count];
        });
        var href = $(this).data("href");
        $(this).prop("href", href + checksStr);
    });
');