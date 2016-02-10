<?
use common\modules\calculator\models\Work;
use common\modules\calculator\models\Worktype;

$itog = 0;
?>
<html>
    <head></head>
    <body>
        <div style="display: block; max-width: 1200px; margin: 0 auto 0 auto; font-size: 14px; font-family: 'Arial';">
            <div style="display: block; width: 100%; text-align: center; margin-top: 20px;">
                Расчет стоимости создания фирменного стиля от WebTeam.pro"
            </div>
            <div style="display: block; width: 100%; margin-top: 20px;">
                <div style="display: block; width: 100%;">
                    <div style="display: block; width: 100%;">
                        <div style="display: block; float: left; padding: 10px;">
                            Работа
                        </div>
                        <div style="display: block; float: right; padding: 10px;">
                            Стоимость, Р.
                        </div>
                        <div style="height: 0; clear: both;"></div>
                    </div>
                    <div style="display: block; width: 100%;">
                        <div style="display: block; width: 100%;">
                            <div style="display: block; width: 100%;">
                                <?
                                $works = Work::find()->where([
                                    'work.worktype_id' => Worktype::TYPE_FIRSTYLE,
                                    'work.parent_id' => null,
                                ])->innerJoinWith([
                                    'works' => function($query) use($subworks){
                                        $query->from('work subwork');
                                        $query->andWhere([
                                            'subwork.id' => array_keys($subworks)
                                        ]);
                                    }
                                ])->all();
                                ?>
                                <?foreach($works as $k=>$work):?>
                                    <div style="display: block; width: 100%;">
                                        <div style="display: block; width: 100%; background: #eceff5;">
                                            <div style="display: block; width: 100%; padding: 10px;">
                                                <span><?=$work->title?></span>
                                            </div>
                                        </div>
                                        <div style="display: block; width: 100%;">
                                            <?
                                            $subWorks = Work::find()->where([
                                                'worktype_id' => Worktype::TYPE_FIRSTYLE,
                                                'parent_id' => $work->id,
                                            ])->andWhere([
                                                'work.id' => array_keys($subworks)
                                            ])->all();
                                            foreach($subWorks as $s=>$subWork):
                                                $itog += $subWork->cost;
                                                ?>
                                                <div style="display: block; width: 100%;">
                                                    <div style="float: left; padding: 10px;">
                                                        <span><?=$subWork->title?></span>
                                                    </div>
                                                    <div style="float: right; padding: 10px;">
                                                        <?=number_format($subWork->cost, 0, '.', ' ');?>
                                                    </div>
                                                    <div style="height: 0; clear: both;"></div>
                                                </div>
                                            <?endforeach?>
                                        </div>
                                        <div style="height: 0; clear: both;"></div>
                                    </div>
                                <?endforeach?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: block; width: 100%; text-align: center; margin-top: 20px; border-top: 1px solid #eceff5; padding-top: 20px;">
                <div style="display: block; width: 100%; font-size: 20px;">
                    Итого: <span id="itog"><?=$itog?></span> Р.
                </div>
            </div>
        </div>
    </body>
</html>