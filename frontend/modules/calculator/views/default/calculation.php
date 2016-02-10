<?
use frontend\modules\calculator\widgets\calculator\Asset;
use common\modules\calculator\models\Specialist;

$specs = Specialist::find()->andWhere([
    'specialist.id' => array_keys($subworks)
])->all();

$itog = 0;
$peopleCnt = 0;
foreach($subworks as $swKey=>$swVal){
    $peopleCnt += $swVal;
}

?>
<html>
    <head></head>
    <body>
        <div style="display: block; width: 100%; font-family: 'Arial'; font-size: 14px;">

            <div style="display: block; width: 100%; text-align: center; margin-top: 20px;">
                Расчет ежемесячной стоимости команды от WebTeam.pro", тысяч рублей
            </div>
            <div style="display: block; width: 100%; margin-top: 20px;">
                <div style="display: block; width: 100%;">
                    <div style="display: block; max-width: 1200px; margin: 0 auto 0 auto;">
                        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: center; font-size: 12px;">
                            <thead>
                            <tr>
                                <td style="width: 176px;">
                                    <div>Специалист</div>
                                    <div>наименование</div>
                                </td>
                                <td>
                                    <div>Количество</div>
                                    <div>специалистов</div>
                                </td>
                                <td>
                                    <div>Итого</div>
                                    <div>стоимость,</div>
                                    <div>тыс.р</div>
                                </td>
                                <td>
                                    <div>Зарплата</div>
                                    <div>специалиста,</div>
                                    <div>тыс.р</div>
                                </td>
                                <td>
                                    <div>Налоги</div>
                                    <div>на зарплату,</div>
                                    <div>% от зарплаты</div>
                                </td>
                                <td>
                                    <div>Амортизация</div>
                                    <div>техники,</div>
                                    <div>тыс.р</div>
                                </td>
                                <td>
                                    <div>Содержание</div>
                                    <div>офиса,</div>
                                    <div>тыс.р</div>
                                </td>
                                <td>
                                    <div>Прибыль</div>
                                    <div>WebTeam,</div>
                                    <div>% от зарплаты</div>
                                </td>
                                <td>
                                    <div>Налог</div>
                                    <div>УСН,</div>
                                    <div>% от общих затрат</div>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <?foreach($specs as $spec):
                                $rowItog = $subworks[$spec->id] * ($spec->getSalary() + $spec->getTax() + $spec->getAmortization() +
                                        $spec->getMaintenance() + $spec->getProfit() + $spec->getUsn());
                                $itog += $rowItog;
                                ?>
                                <tr>
                                    <td>
                                        <div>
                                            <?=$spec->name?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="t-counter" data-id="<?=$spec->id?>">
                                            <div class="t-counter-elem t-count-qty">
                                                <?=$subworks[$spec->id]?>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="row-itog"><?=$rowItog?></td>
                                    <td class="price"><?=$spec->getSalary()?></td>
                                    <td class="price"><?=$spec->getTax()?></td>
                                    <td class="price"><?=$spec->getAmortization()?></td>
                                    <td class="price"><?=$spec->getMaintenance()?></td>
                                    <td class="price"><?=$spec->getProfit()?></td>
                                    <td class="price"><?=$spec->getUsn()?></td>
                                </tr>
                            <?endforeach?>
                            <?$itog = 1000*$itog;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div style="display: block; width: 100%; margin-top: 20px; text-align: center;">
                <div style="display: block; width: 100%; font-size: 20px;">
                    Ежемесячная стоимость выбранной Вами команды из <span><?=$peopleCnt?></span> человек составит
                        <span id="itog"><?=$itog?></span> Р.
                </div>
                <div style="display: block; width: 100%; margin-top: 20px;">
                    Закажите индивидуальный расчёт (info@webteam.pro), если Вам требуются особые условия<br>
                    (частичная занятость, наличная оплата, очень большая команда)
                </div>

            </div>
        </div>

        <?$this->registerJs('
            var itog = $("#itog").html();
            itog = itog.replace(/(\d)(?=(\d{3})+(\D|$))/g, "$1 ");
            $("#itog").html(itog);
        ');?>
    </body>
</html>