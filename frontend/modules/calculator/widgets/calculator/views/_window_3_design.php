<?
use frontend\modules\calculator\widgets\calculator\Asset;
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
use backend\modules\calculator\models\Work;
use common\modules\calculator\models\Worktype;

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
            Назад
        </div>
    </div>
    <div class="swc-title transit-1000">
        Расчет стоимости дизайна страниц
    </div>
    <div class="swc-content">
        <div class="swc-6-items-block transit-1000">
            <div class="swc-6-title-name">
                <div class="tn-left">
                    Работа
                </div>
                <div class="tn-right">
                    Стоимость, <img src="<?=Asset::imgSrc('icon-rub.png')?>" alt="" class="icon-rub-small">
                </div>
                <div class="tn-match-name">
                    Количество
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
                                        <input type="checkbox" id="check-ds-<?=$k?>" data-id="<?=$work->id?>">
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
                                        1
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
            Итого: <span id="itog">0</span> <img src="<?=Asset::imgSrc('icon-rub-big.png')?>" alt="" class="icon-rub-big">
        </div>
        <div class="swc-5-footer-content">
            <div class="swc-5-footer-btn transit-300" id="print_button">
                <a data-pjax="0" href="#" data-href="<?=\yii\helpers\Url::toRoute(['/calculator/default/print-page', 'page'=>CalculatorWidget::FROM_CALCULATOR_DESIGN])?>" target="_blank">
                    Распечатать расчеты
                </a>
            </div>
            <div class="swc-5-footer-btn transit-300" id="sendtoemail" data-page="<?=CalculatorWidget::FROM_CALCULATOR_DESIGN?>" data-next="<?=CalculatorWidget::TYPE_SEND_EMAIL_FORM?>">
                Отправить на e-mail
            </div>
            <div class="swc-5-footer-btn transit-300 swc-item" data-page="<?=CalculatorWidget::FROM_CALCULATOR_DESIGN?>"data-next="<?=CalculatorWidget::TYPE_SEND_FORM?>">
                Узнать о скидках
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
        $.pjax.reload("#pjax-calculator-container", {
            "type": "GET",
            "data": {calculator_type: next, page: page, data:checks},
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