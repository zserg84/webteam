<?
use frontend\modules\calculator\widgets\calculator\Asset;
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
?>
<div class="sw-container swc-win-11 transit-1000">
    <div class="btn-back-block transit-300" data-winback="11"  data-prev="<?=CalculatorWidget::TYPE_2_WEBSITE?>">
        <div class="arrow-icon">
            <img src="<?=Asset::imgSrc("arrow-back.png")?>" alt="">
        </div>
        <div class="btn-name">
            Назад
        </div>
    </div>
    <div class="swc-title transit-1000">
        Стоимость социальной сети
    </div>
    <div class="swc-content">
        <div class="swc-11-items-block transit-1000">
            <div class="swc-11-context">
                Наша студия занималась разработкой большой социальной сети для заказчиков из США, поэтому мы знаем что это такое на личном опыте.
            </div>
            <div class="swc-11-context">
                Пожалуйста, серьезно оцените свои возможности и ресурсы если Вы хотите создать новую успешную социальную сеть с нуля.
                <ul>
                    <li>

                        <div class="social-description">
                            <div class="sd-check-block">
                                <input type="checkbox" id="social-check-1">
                                <label for="social-check-1"></label>
                            </div>
                            <div class="sd-check-context">
                                Я понимаю, что социальных сетей уже очень много, поэтому имеет смысл создавать только такую социальную сеть, которая нацелена на узкую аудиторию или имеет уникальные конкурентные преимущества
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </li>
                    <li>

                        <div class="social-description sd-bg-second">
                            <div class="sd-check-block">
                                <input type="checkbox" id="social-check-2">
                                <label for="social-check-2"></label>
                            </div>
                            <div class="sd-check-context">
                                Я понимаю, что создание социальной сети - это дорогая разработка и после запуска проекта придется тратить значительные средства на его последующее поддержание (развитие), продвижение и обслуживание
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </li>
                    <li>

                        <div class="social-description">
                            <div class="sd-check-block">
                                <input type="checkbox" id="social-check-3">
                                <label for="social-check-3"></label>
                            </div>
                            <div class="sd-check-context">
                                Я понимаю, что на создание и запуск уникальной социальной сети уйдет не меньше 6 рабочих месяцев
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="swc-footer transit-1000">
        <div class="swc-11-btn-block">
            <div class="swc-11-button btn-disable transit-300 swc-item"
                 data-next="<?=CalculatorWidget::TYPE_4_SOC_NETWORK?>">
                Продолжить
            </div>
        </div>
    </div>
</div>