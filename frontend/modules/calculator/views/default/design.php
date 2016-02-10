<?
use frontend\modules\calculator\widgets\calculator\Asset;
use backend\modules\calculator\models\Work;
use common\modules\calculator\models\Worktype;
$itog = 0;
$works = Work::find()->where([
    'worktype_id' => Worktype::TYPE_DESIGN,
    'parent_id' => null,
])->andWhere([
    'work.id' => array_keys($subworks)
])->all();
?>
<html>
    <head></head>
    <body>
        <div style="display: block; max-width: 1200px; margin: 0 auto 0 auto; font-size: 14px; font-family: 'Arial';">

            <div style="display: block; width: 100%; text-align: center; margin-top: 20px;">
                Расчет стоимости дизайна страниц от Webteam.pro
            </div>
            <div style="display: block; width: 100%; margin-top: 20px;">
                <div style="display: block; width: 100%;">
                    <div style="display: block; width: 100%;">
                        <table style="width: 100%; background: #eceff5; padding: 10px;">
                            <tr>
                                <td>Работа</td>
                                <td style="width: 200px; text-align: center;">Количество</td>
                                <td style="width: 200px; text-align: right;">Стоимость, Р.</td>
                            </tr>
                        </table>
                    </div>
                    <div style="display: block; width: 100%;">
                        <div style="display: block; width: 100%;">
                            <div style="display: block; width: 100%;">
                                <?foreach($works as $k=>$work):
                                    $itog += ($work->cost * $subworks[$work->id]);
                                    ?>
                                    <table style="width: 100%; padding: 10px;">
                                        <tr>
                                            <td><span><?=$work->title?></span></td>
                                            <td style="width: 200px; text-align: center;">
                                                <?=$subworks[$work->id]?>
                                            </td>
                                            <td style="width: 200px; text-align: right;">
                                                <?=number_format($work->cost, 0, '.', ' ');?>
                                            </td>
                                        </tr>
                                    </table>
                                <?endforeach?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: block; width: 100%; text-align: center; margin-top: 20px; border-top: 1px solid #eceff5; padding-top: 20px;">
                <div style="display: block; width: 100%; font-size: 20px;">
                    Итого: <?=$itog?> Р.
                </div>
            </div>
        </div>
    </body>
</html>