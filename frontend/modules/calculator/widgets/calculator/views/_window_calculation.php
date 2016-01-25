<?
use frontend\modules\calculator\widgets\calculator\Asset;
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
use common\modules\calculator\models\Specialist;

$specs = Specialist::find()->visible()->all();
?>
<div class="sw-container swc-win-14 transit-1000">
    <div class="btn-back-block transit-300" data-winback="14" data-prev="<?=CalculatorWidget::TYPE_START?>">
        <div class="arrow-icon">
            <img src="<?=Asset::imgSrc("arrow-back.png")?>" alt="">
        </div>
        <div class="btn-name">
            Назад
        </div>
    </div>
    <div class="swc-title transit-1000">
        Расчет ежемесячной стоимости команды, тысяч рублей
    </div>
    <div class="swc-content">
        <div class="swc-14-items-block transit-1000">
            <div class="swc-14-price-content">
                <table>
                    <thead>
                        <tr>
                            <td>
                                <div class="t-name">
                                    Специалист
                                </div>
                                <div class="t-sub-name">
                                    наименование
                                </div>
                            </td>
                            <td>
                                <div class="t-name">
                                    Количество
                                </div>
                                <div class="t-sub-name">
                                    специалистов
                                </div>
                            </td>
                            <td>
                                <div class="t-name">
                                    Итого
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
                                    стоимость
                                </div>
                            </td>
                            <td>
                                <div class="t-name">
                                    Зарплата

                                    <div class="t-info">
                                        <span>?</span>

                                        <div class="t-tooltip">
                                            <div class="t-tooltip-context">
                                                размер зарплаты, которую наш сотрудник получит "на руки"
                                            </div>
                                            <div class="t-tooltip-arrow"></div>
                                        </div>

                                    </div>

                                </div>
                                <div class="t-sub-name">
                                    специалиста
                                </div>
                            </td>
                            <td>
                                <div class="t-name">
                                    Налоги

                                    <div class="t-info">
                                        <span>?</span>

                                        <div class="t-tooltip">
                                            <div class="t-tooltip-context">
                                                льготная система налогообложения 13% НДФЛ + 20%ФСС + 0.2% ФСС НС
                                            </div>
                                            <div class="t-tooltip-arrow"></div>
                                        </div>

                                    </div>

                                </div>
                                <div class="t-sub-name">
                                    на зарплату
                                </div>
                            </td>
                            <td>
                                <div class="t-name">
                                    Амортизация

                                    <div class="t-info">
                                        <span>?</span>

                                        <div class="t-tooltip">
                                            <div class="t-tooltip-context">
                                                апгрейд (замена) оборудования происходит через 2 года работы
                                            </div>
                                            <div class="t-tooltip-arrow"></div>
                                        </div>

                                    </div>

                                </div>
                                <div class="t-sub-name">
                                    техники
                                </div>
                            </td>
                            <td>
                                <div class="t-name">
                                    Содержание

                                    <div class="t-info">
                                        <span>?</span>

                                        <div class="t-tooltip">
                                            <div class="t-tooltip-context">
                                                аренда офиса, содержание (уборка) помещений, вода/чай-кофе/бакалея, зарплата бухгалтеров и юристов, офисные расходы
                                            </div>
                                            <div class="t-tooltip-arrow"></div>
                                        </div>

                                    </div>

                                </div>
                                <div class="t-sub-name">
                                    офиса
                                </div>
                            </td>
                            <td>
                                <div class="t-name">
                                    Прибыль

                                    <div class="t-info">
                                        <span>?</span>

                                        <div class="t-tooltip">
                                            <div class="t-tooltip-context">
                                                в больших проектах мы работаем по принципу "прозрачности" с Клиентом
                                            </div>
                                            <div class="t-tooltip-arrow"></div>
                                        </div>

                                    </div>

                                </div>
                                <div class="t-sub-name">
                                    WebTeam
                                </div>
                            </td>
                            <td>
                                <div class="t-name">
                                    Налог

                                    <div class="t-info">
                                        <span>?</span>

                                        <div class="t-tooltip">
                                            <div class="t-tooltip-context">
                                                Мы платим 6% налог со всех входящих платежей
                                            </div>
                                            <div class="t-tooltip-arrow"></div>
                                        </div>

                                    </div>

                                </div>
                                <div class="t-sub-name">
                                    УСН
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
            Ежемесячная стоимость выбранной Вами команды из <span id="peopleCnt">0</span> человек составит
            <span id="itog">
                0
            </span> <img src="<?=Asset::imgSrc("icon-rub-big.png")?>" alt="" class="icon-rub-big">
        </div>
        <div class="swc-14-footer-sub-title">
            Закажите индивидуальный расчёт, если Вам требуются особые условия<br>(частичная занятость, наличная оплата, очень большая команда)
        </div>
        <div class="swc-14-footer-content">
            <div class="swc-14-footer-btn transit-300" id="print_button">
                <a data-pjax="0" href="#" data-href="<?=\yii\helpers\Url::toRoute(['/calculator/default/print-page', 'page'=>CalculatorWidget::FROM_CALCULATOR_CALCULATION])?>" target="_blank">
                    Распечатать расчеты
                </a>
            </div>
            <div class="swc-14-footer-btn transit-300" id="sendtoemail" data-page="<?=CalculatorWidget::FROM_CALCULATOR_CALCULATION?>" data-next="<?=CalculatorWidget::TYPE_SEND_EMAIL_FORM?>">
                Отправить на e-mail
            </div>
            <div class="swc-14-footer-btn transit-300 swc-item" data-page="<?=CalculatorWidget::FROM_CALCULATOR_CALCULATION?>" data-next="<?=CalculatorWidget::TYPE_SEND_FORM?>">
                Узнать о скидках
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
        $.pjax.reload("#pjax-calculator-container", {
            "type": "GET",
            "data": {calculator_type: next, page: page, data:checks},
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