<?
use frontend\modules\calculator\widgets\calculator\Asset;
use common\modules\calculator\models\Specialist;
use frontend\modules\calculator\Module;

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
                <?=Module::t('calculation', 'TEAM_TITLE')?>
            </div>
            <div style="display: block; width: 100%; margin-top: 20px;">
                <div style="display: block; width: 100%;">
                    <div style="display: block; max-width: 1200px; margin: 0 auto 0 auto;">
                        <table border="1" cellpadding="10" cellspacing="0" style="width: 100%; text-align: center; font-size: 12px;">
                            <thead>
                            <tr>
                                <td style="width: 176px;">
                                    <div><?=Module::t('calculation', 'TEAM_NAME_1')?></div>
                                    <div><?=Module::t('calculation', 'TEAM_SUBNAME_1')?></div>
                                </td>
                                <td>
                                    <div><?=Module::t('calculation', 'TEAM_NAME_2')?></div>
                                    <div><?=Module::t('calculation', 'TEAM_SUBNAME_2')?></div>
                                </td>
                                <td>
                                    <div><?=Module::t('calculation', 'TEAM_NAME_3')?></div>
                                    <div><?=Module::t('calculation', 'TEAM_SUBNAME_3')?></div>
                                    <div><?=Module::t('calculation', 'TEAM_CURRENCY')?></div>
                                </td>
                                <td>
                                    <div><?=Module::t('calculation', 'TEAM_NAME_4')?></div>
                                    <div><?=Module::t('calculation', 'TEAM_SUBNAME_4')?></div>
                                    <div><?=Module::t('calculation', 'TEAM_CURRENCY')?></div>
                                </td>
                                <td>
                                    <div><?=Module::t('calculation', 'TEAM_NAME_5')?></div>
                                    <div><?=Module::t('calculation', 'TEAM_SUBNAME_5')?></div>
                                    <div><?=Module::t('calculation', 'TEAM_PERCENT')?></div>
                                </td>
                                <td>
                                    <div><?=Module::t('calculation', 'TEAM_NAME_6')?></div>
                                    <div><?=Module::t('calculation', 'TEAM_SUBNAME_6')?></div>
                                    <div><?=Module::t('calculation', 'TEAM_CURRENCY')?></div>
                                </td>
                                <td>
                                    <div><?=Module::t('calculation', 'TEAM_NAME_7')?></div>
                                    <div><?=Module::t('calculation', 'TEAM_SUBNAME_7')?></div>
                                    <div><?=Module::t('calculation', 'TEAM_CURRENCY')?></div>
                                </td>
                                <td>
                                    <div><?=Module::t('calculation', 'TEAM_NAME_8')?></div>
                                    <div><?=Module::t('calculation', 'TEAM_SUBNAME_8')?></div>
                                    <div><?=Module::t('calculation', 'TEAM_PERCENT')?></div>
                                </td>
                                <td>
                                    <div><?=Module::t('calculation', 'TEAM_NAME_9')?></div>
                                    <div><?=Module::t('calculation', 'TEAM_SUBNAME_9')?></div>
                                    <div><?=Module::t('calculation', 'TEAM_PERCENT_TOTAL')?></div>
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
                    <?=Module::t('calculation', 'TEAM_TOTAL_1')?> <span><?=$peopleCnt?></span> <?=Module::t('calculation', 'TEAM_TOTAL_2')?>
                        <span id="itog"><?=$itog?></span> <?=Module::t('main', 'CURRENCY')?>
                </div>
                <div style="display: block; width: 100%; margin-top: 20px;">
                    <?=Module::t('calculation', 'TEAM_CONTENT')?>
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