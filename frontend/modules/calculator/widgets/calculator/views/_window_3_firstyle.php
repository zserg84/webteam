<?
use frontend\modules\calculator\widgets\calculator\Asset;
use common\modules\calculator\models\Work;
use common\modules\calculator\models\Worktype;
use yii\helpers\Url;
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;

$works = Work::find()->where([
    'worktype_id' => Worktype::TYPE_FIRSTYLE,
    'parent_id' => null,
])->all();
?>
<div class="sw-container swc-win-5 transit-1000">
    <div class="btn-back-block transit-300" data-winback="5" data-prev="<?=CalculatorWidget::TYPE_2_DESIGN_FIRSTYLE?>">
        <div class="arrow-icon">
            <img src="<?=Asset::imgSrc("arrow-back.png")?>" alt="">
        </div>
        <div class="btn-name">
            Назад
        </div>
    </div>
    <div class="swc-title transit-1000">
        Расчет стоимости создания фирменного стиля
    </div>
    <div class="swc-content">
        <div class="swc-5-items-block transit-1000">
            <div class="swc-5-title-name">
                <div class="tn-left">
                    Работа
                </div>
                <div class="tn-right">
                    Стоимость, <img src="<?=Asset::imgSrc("icon-rub.png")?>" alt="" class="icon-rub-small">
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="swc-5-price-content">
                <div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
                <div class="viewport">
                    <div class="overview swc-5-overview">
                        <?foreach($works as $k=>$work):
                            $class = $k ? '' : 'ib-blinking';
                            ?>
                            <div class="item-swc-5">
                                <div class="item-btn-arrow <?=$class?>" data-scroll-window="5">
                                    <div class="internal-arrow"></div>
                                </div>
                                <div class="item-title">
                                    <div class="item-title-name">
                                        <input type="checkbox" id="check-title-<?=$k?>">
                                        <label for="check-title-<?=$k?>">
                                            <span class="it-name"><?=$work->title?></span>
<!--                                            <span class="it-mach">(0 из 8)</span>-->
                                        </label>
                                    </div>
                                </div>
                                <div class="item-sub-content">
                                    <?
                                    $subWorks = Work::find()->where([
                                        'worktype_id' => Worktype::TYPE_FIRSTYLE,
                                        'parent_id' => $work->id,
                                    ])->all();
                                    foreach($subWorks as $s=>$subWork):?>
                                        <div class="item-sub-cell">
                                            <div class="item-sub-name">
                                                <input type="checkbox" id="check-sub-title-<?=$k.'-'.$s?>" data-id="<?=$subWork->id?>">
                                                <label for="check-sub-title-<?=$k.'-'.$s?>">
                                                    <span class="it-name"><?=$subWork->title?></span>
                                                </label>
                                            </div>
                                            <div class="item-sub-price" data-price="<?=$subWork->cost?>">
                                                <?=number_format($subWork->cost, 0, '.', ' ');?>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    <?endforeach?>
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
            Итого: <span id="itog">0</span> <img src="<?=Asset::imgSrc("icon-rub-big.png")?>" alt="" class="icon-rub-big">
        </div>
        <div class="swc-5-footer-content">
            <div class="swc-5-footer-btn transit-300" id="print_button">
                <a data-pjax="0" href="#" data-href="<?=Url::toRoute(['/calculator/default/print-page', 'page'=>CalculatorWidget::FROM_CALCULATOR_FIRSTYLE])?>" target="_blank">
                    Распечатать расчеты
                </a>
            </div>
            <div class="swc-5-footer-btn transit-300" id="sendtoemail" data-page="<?=CalculatorWidget::FROM_CALCULATOR_FIRSTYLE?>" data-next="<?=CalculatorWidget::TYPE_SEND_EMAIL_FORM?>">
                Отправить на e-mail
            </div>
            <div class="swc-5-footer-btn transit-300 swc-item" data-page="<?=CalculatorWidget::FROM_CALCULATOR_FIRSTYLE?>" data-next="<?=CalculatorWidget::TYPE_SEND_FORM?>">
                Узнать о скидках
            </div>
        </div>
    </div>
</div>
<?$this->registerJs('
    function pageCleaner(){
        $("body").removeClass("printSelected");
        $(".printSelection").remove();
    }

    function calcItog(){
        var itog = 0;
        $(".item-sub-cell input[type=checkbox]:checked").each(function(){
            var price = $(this).closest(".item-sub-cell").find(".item-sub-price").data("price");
            itog += price;
        });
        itog = String(itog);
        itog = itog.replace(/(\d)(?=(\d{3})+(\D|$))/g, "$1 ");
        $("#itog").html(itog);
    }

    $(document).on("change", ".item-sub-cell input[type=checkbox]", function(){
        calcItog();
    });

    $(document).on("change", ".item-title-name", function() {
        if ( $(this).children("input").prop("checked") ) {
            $(this).parent().next().children(".item-sub-cell").children(".item-sub-name").children("input").each(function() {
                $(this).prop("checked", true);
            });
        } else {
            $(this).parent().next().children(".item-sub-cell").children(".item-sub-name").children("input").each(function() {
                $(this).prop("checked", false);
            });
        }
        calcItog();
    });

    $(document).on("click", "#sendtoemail", function(){
        if($(this).hasClass("btn-disable"))
            return;
        var checks = [];
        $(".item-sub-cell input[type=checkbox]:checked").each(function(){
            checks[checks.length] = [$(this).data("id"), 1];
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
        $(".item-sub-cell input[type=checkbox]:checked").each(function(){
            checksStr += "&subworks[]=" + [$(this).data("id"), 1];
        });
        var href = $(this).data("href");
        $(this).prop("href", href + checksStr);
    });
');