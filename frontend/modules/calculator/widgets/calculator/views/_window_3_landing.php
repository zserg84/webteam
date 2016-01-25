<?
use frontend\modules\calculator\widgets\calculator\Asset;
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
?>
<div class="sw-container swc-win-7 transit-1000">
    <div class="btn-back-block transit-300" data-winback="7" data-prev="<?=CalculatorWidget::TYPE_2_WEBSITE?>">
        <div class="arrow-icon">
            <img src="<?=Asset::imgSrc("arrow-back.png")?>" alt="">
        </div>
        <div class="btn-name">
            Назад
        </div>
    </div>
    <div class="swc-title transit-1000">
        Стоимость лендинг пейдж или сайта-визитки
    </div>
    <div class="swc-content">
        <div class="swc-7-items-block transit-1000">
            <div class="swc-7-context">
                Мы создаем высококачественный продающий продукт, который конвертирует Ваших посетителей в заказы.
            </div>
            <div class="swc-7-context">
                Наш подход требует привлечения высокопрофессиональных специалистов:
                <ul>
                    <li>
                        <span>
                            проектировщика интерфейсов
                        </span>
                    </li>
                    <li>
                        <span>
                            арт-директора (дизайнера)
                        </span>
                    </li>
                    <li>
                        <span>
                            фронт-энд программиста
                        </span>
                    </li>
                    <li>
                        <span>
                            контент-менеджера
                        </span>
                    </li>
                </ul>
            </div>
            <div class="swc-7-context">
                Стоимость подобного сайта в нашей студии начинается от 120 тысяч рублей
            </div>
        </div>
    </div>
    <div class="swc-footer transit-1000">
        <div class="swc-7-btn-block">
            <div class="swc-7-button transit-300 swc-item" data-page="<?=CalculatorWidget::FROM_CALCULATOR_LANDING?>" data-next="<?=CalculatorWidget::TYPE_SEND_FORM?>">
                Получить детальный расчёт
            </div>
        </div>
    </div>
</div>