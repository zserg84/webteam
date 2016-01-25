<?
use frontend\modules\calculator\widgets\calculator\Asset;
use common\modules\calculator\models\Work;
use common\modules\calculator\models\Worktype;
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;

$works = Work::find()->where([
    'worktype_id' => Worktype::TYPE_FIRSTYLE,
    'parent_id' => null,
])->all();
?>
<div class="sw-container swc-win-5 transit-1000">
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
                        <?foreach($works as $k=>$work):?>
                            <div class="item-swc-5">
                                <div class="item-btn-arrow" data-scroll-window="5">
                                    <div class="internal-arrow"></div>
                                </div>
                                <div class="item-title">
                                    <div class="item-title-name">
                                        <input type="checkbox" id="check-title-<?=$k?>">
                                        <label for="check-title-<?=$k?>">
                                            <span class="it-name"><?=$work->title?></span>
                                            <span class="it-mach">(0 из 8)</span>
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
                                                <input type="checkbox" id="check-sub-title-<?=$k.'-'.$s?>">
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
            <div class="swc-5-footer-btn transit-300" onclick="
                $('body').addClass('printSelected');
                $('body').append('<div class=\'printSelection\'></div>');
                $('#pjax-calculator-container').clone().appendTo('.printSelection');
                window.print();
                window.setTimeout(pageCleaner, 0);
            ">
                Распечатать расчеты
            </div>
            <div class="swc-5-footer-btn transit-300">
                Отправить на e-mail
            </div>
            <div class="swc-5-footer-btn transit-300 swc-item" data-next="<?=CalculatorWidget::TYPE_SEND_FORM?>">
                Узнать о скидках
            </div>
        </div>
    </div>
</div>