<?
use frontend\modules\calculator\widgets\calculator\Asset;
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
use common\modules\calculator\models\Specialist;
use frontend\modules\calculator\Module;

$specs = Specialist::find()->visible()->all();
?>
<div class="sw-container swc-win-14 transit-1000">
    <div class="btn-back-block transit-300"
         data-prev="<?=$from?>"
        >
        <div class="arrow-icon">
            <img src="<?=Asset::imgSrc("arrow-back.png")?>" alt="">
        </div>
        <div class="btn-name">
            <?=Module::t('main', 'BUTTON_BACK')?>
        </div>
    </div>
    <div class="swc-title transit-1000">
        <?=Module::t('calculation', 'TEAM_TITLE')?>
    </div>
    <div class="swc-content">
        <div class="swc-14-items-block transit-1000">
            <div class="swc-14-price-content">
                <table>
                    <thead>
                        <tr>
                            <td>
                                <div class="t-name">
                                    <?=Module::t('calculation', 'TEAM_NAME_1')?>
                                </div>
                                <div class="t-sub-name">
                                    <?=Module::t('calculation', 'TEAM_SUBNAME_1')?>
                                </div>
                            </td>
                            <td>
                                <div class="t-name">
                                    <?=Module::t('calculation', 'TEAM_NAME_2')?>
                                </div>
                                <div class="t-sub-name">
                                    <?=Module::t('calculation', 'TEAM_SUBNAME_2')?>
                                </div>
                            </td>
                            <td>
                                <div class="t-name">
                                    <?=Module::t('calculation', 'TEAM_NAME_3')?>
                                    <!--
                                    <div class="t-info">
                                        <span>?</span>

                                        <div class="t-tooltip">
                                            <div class="t-tooltip-context">
                                                мы платим 6% ИТОГО
                                            </div>
                                            <div class="t-tooltip-arrow"></div>
                                        </div>

                                    </div>
                                    -->
                                </div>
                                <div class="t-sub-name">
                                    <?=Module::t('calculation', 'TEAM_SUBNAME_3')?>
                                </div>
                            </td>
                            <td>
                                <div class="t-name">
                                    <?=Module::t('calculation', 'TEAM_NAME_4')?>
                                    <div class="t-info">
                                        <span>?</span>

                                        <div class="t-tooltip">
                                            <div class="t-tooltip-context">
                                                <?=Module::t('calculation', 'TEAM_TOOLTIP_4')?>
                                            </div>
                                            <div class="t-tooltip-arrow"></div>
                                        </div>

                                    </div>

                                </div>
                                <div class="t-sub-name">
                                    <?=Module::t('calculation', 'TEAM_SUBNAME_4')?>
                                </div>
                            </td>
                            <td>
                                <div class="t-name">
                                    <?=Module::t('calculation', 'TEAM_NAME_5')?>
                                    <div class="t-info">
                                        <span>?</span>
                                        <div class="t-tooltip">
                                            <div class="t-tooltip-context">
                                                <?=Module::t('calculation', 'TEAM_TOOLTIP_5')?>
                                            </div>
                                            <div class="t-tooltip-arrow"></div>
                                        </div>

                                    </div>

                                </div>
                                <div class="t-sub-name">
                                    <?=Module::t('calculation', 'TEAM_SUBNAME_5')?>
                                </div>
                            </td>
                            <td>
                                <div class="t-name">
                                    <?=Module::t('calculation', 'TEAM_NAME_6')?>

                                    <div class="t-info">
                                        <span>?</span>

                                        <div class="t-tooltip">
                                            <div class="t-tooltip-context">
                                                <?=Module::t('calculation', 'TEAM_TOOLTIP_6')?>
                                            </div>
                                            <div class="t-tooltip-arrow"></div>
                                        </div>

                                    </div>

                                </div>
                                <div class="t-sub-name">
                                    <?=Module::t('calculation', 'TEAM_SUBNAME_6')?>
                                </div>
                            </td>
                            <td>
                                <div class="t-name">
                                    <?=Module::t('calculation', 'TEAM_NAME_7')?>

                                    <div class="t-info">
                                        <span>?</span>

                                        <div class="t-tooltip">
                                            <div class="t-tooltip-context">
                                                <?=Module::t('calculation', 'TEAM_TOOLTIP_7')?>
                                            </div>
                                            <div class="t-tooltip-arrow"></div>
                                        </div>

                                    </div>

                                </div>
                                <div class="t-sub-name">
                                    <?=Module::t('calculation', 'TEAM_SUBNAME_7')?>
                                </div>
                            </td>
                            <td>
                                <div class="t-name">
                                    <?=Module::t('calculation', 'TEAM_NAME_8')?>

                                    <div class="t-info">
                                        <span>?</span>

                                        <div class="t-tooltip">
                                            <div class="t-tooltip-context">
                                                <?=Module::t('calculation', 'TEAM_TOOLTIP_5')?>
                                            </div>
                                            <div class="t-tooltip-arrow"></div>
                                        </div>

                                    </div>

                                </div>
                                <div class="t-sub-name">
                                    <?=Module::t('calculation', 'TEAM_SUBNAME_8')?>
                                </div>
                            </td>
                            <td>
                                <div class="t-name">
                                    <?=Module::t('calculation', 'TEAM_NAME_9')?>

                                    <div class="t-info">
                                        <span>?</span>

                                        <div class="t-tooltip">
                                            <div class="t-tooltip-context">
                                                <?=Module::t('calculation', 'TEAM_TOOLTIP_9')?>
                                            </div>
                                            <div class="t-tooltip-arrow"></div>
                                        </div>

                                    </div>

                                </div>
                                <div class="t-sub-name">
                                    <?=Module::t('calculation', 'TEAM_SUBNAME_9')?>
                                </div>
                            </td>
                        </tr>

                    </thead>

                    <tbody>
                    <?foreach($specs as $spec):?>
                        <tr>
                            <td>
                                <div class="t-name">
                                    <?=$spec->name?>
                                </div>
                            </td>
                            <td>
                                <div class="t-counter" data-id="<?=$spec->id?>">
                                    <div class="t-counter-elem t-count-btn-min btn-qty">
                                        &nbsp;
                                    </div>
                                    <div class="t-counter-elem t-count-qty">
                                        0
                                    </div>
                                    <div class="t-counter-elem t-count-btn-max btn-qty">
                                        &nbsp;
                                    </div>
                                </div>

                            </td>
                            <td class="row-itog">0</td>
                            <td class="price"><?=$spec->getSalary()?></td>
                            <td class="price"><?=$spec->getTax()?></td>
                            <td class="price"><?=$spec->getAmortization()?></td>
                            <td class="price"><?=$spec->getMaintenance()?></td>
                            <td class="price"><?=$spec->getProfit()?></td>
                            <td class="price"><?=$spec->getUsn()?></td>
                        </tr>
                    <?endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="swc-footer transit-1000">

        <div class="swc-14-footer-title">
            <?=Module::t('calculation', 'TEAM_TOTAL_1')?> <span id="peopleCnt">0</span> <?=Module::t('calculation', 'TEAM_TOTAL_2')?>
            <span id="itog">
                0
            </span> <img src="<?=Asset::imgSrc(Module::t('main', 'SITE_CURRENCY_BIG'))?>" alt="" class="icon-rub-big">
        </div>
        <div class="swc-14-footer-sub-title">
            <?=Module::t('calculation', 'TEAM_CONTENT')?>
        </div>
        <div class="swc-14-footer-content">
            <div class="swc-14-footer-btn transit-300" id="print_button">
                <a data-pjax="0" href="#" data-href="<?=\yii\helpers\Url::toRoute(['/calculator/default/print-page', 'page'=>CalculatorWidget::FROM_CALCULATOR_CALCULATION])?>" target="_blank">
                    <?=Module::t('main', 'BUTTON_PRINT')?>
                </a>
            </div>
            <div class="swc-14-footer-btn transit-300"
                 id="sendtoemail"
                 data-from = "<?=CalculatorWidget::TYPE_CALCULATION?>"
                 data-page="<?=CalculatorWidget::FROM_CALCULATOR_CALCULATION?>"
                 data-next="<?=CalculatorWidget::TYPE_SEND_EMAIL_FORM?>"
                >
                <?=Module::t('main', 'BUTTON_TO_EMAIL')?>
            </div>
            <div class="swc-14-footer-btn transit-300 swc-item"
                 data-from = "<?=CalculatorWidget::TYPE_CALCULATION?>"
                 data-page="<?=CalculatorWidget::FROM_CALCULATOR_CALCULATION?>"
                 data-next="<?=CalculatorWidget::TYPE_SEND_FORM?>"
                >
                <?=Module::t('main', 'BUTTON_DISCOUNT')?>
            </div>
        </div>

    </div>
</div>

<?$this->registerJs('
    $(function(){
        scrollPane();
        setTimeout(function () {
            $(".substrate-window").addClass("max-width-window");
        }, 500);
    });

    function calcItog(el){
        var itog = 0;
        var allPrice = 0;
        var allPeopleCount = 0;
        $(".swc-content table tbody tr .t-counter").each(function(){
            var count = Number($(this).find(".t-count-qty").html());
            var price = 0;
            var tr = $(this).closest("tr");
            tr.find("td.price").each(function(){
                price += Number($(this).html());
            });
            var rowItog = count * price;
            rowItog = Math.ceil(rowItog*10)/10;
            $(this).closest("tr").find(".row-itog").html(rowItog);
            allPrice += rowItog;
            allPeopleCount += count;
        });
        allPrice = 1000 * allPrice;
        allPrice = allPrice.toFixed(0);
        allPrice = String(allPrice);
        allPrice = allPrice.replace(/(\d)(?=(\d{3})+(\D|$))/g, "$1 ");
        $("#itog").html(allPrice);
        $("#peopleCnt").html(allPeopleCount);
    }

    $(document).on("click", ".btn-qty", function(){
        calcItog($(this));
    });

    $(document).on("click", "#sendtoemail", function(){
        if($(this).hasClass("btn-disable"))
            return;
        var checks = [];
        $(".swc-content table tbody tr .t-counter").each(function(){
            var count = Number($(this).find(".t-count-qty").html());
            if(count && count > 0){
                checks[checks.length] = [$(this).data("id"), count];
            }
        });

        var next = $(this).data("next");
        var page = $(this).data("page");
        var from = $(this).data("from");
        from = from ? from : 1;
        $.pjax.reload("#pjax-calculator-container", {
            "type": "GET",
            "data": {calculator_type: next, page: page, data:checks, from:from},
            "push": false,
            "replace": false
        });
    });

    $(document).on("click", "#print_button a", function(){
        var checksStr = "";
        $(".swc-content table tbody tr .t-counter").each(function(){
            var count = Number($(this).find(".t-count-qty").html());
            if(count && count > 0){
                checksStr += "&subworks[]=" + [$(this).data("id"), count];
            }
        });
        var href = $(this).data("href");
        $(this).prop("href", href + checksStr);
    });
');