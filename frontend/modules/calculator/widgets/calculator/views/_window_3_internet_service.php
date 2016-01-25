<?
use frontend\modules\calculator\widgets\calculator\Asset;
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
?>
<div class="sw-container swc-win-10 transit-1000">
    <div class="btn-back-block transit-300" data-winback="10" data-prev="<?=CalculatorWidget::TYPE_2_WEBSITE?>">
        <div class="arrow-icon">
            <img src="<?=Asset::imgSrc("arrow-back.png")?>" alt="">
        </div>
        <div class="btn-name">
            Назад
        </div>
    </div>
    <div class="swc-title transit-1000">
        Стоимость интернет сервиса
    </div>
    <div class="swc-content">
        <div class="swc-10-items-block transit-1000">
            <p>
                Интернет сервис - это всегда интересная и уникальная задача, для решения которой мы формируем отдельную команду, занимающуюся только Вашим проектом.
            </p>
            <p>
                У нашей студии богатый опыт создания уникальных интернет-сервисов для решения различных задач. Мы работаем как в секторе B2B, так и B2C.
            </p>
            <p>
                К сожалению, невозможно ответить на общий вопрос «сколько стоит интернет сервис».<br>Это может быть 500 тысяч рублей, а может быть и 10 миллионов рублей.
            </p>
            <p>
                В каждом случае мы выясняем потребности (задачи) и затем готовим коммерческое предложение. Напишите нам, и мы оперативно свяжемся с Вами!
            </p>
        </div>
    </div>
    <div class="swc-footer transit-1000">
        <div class="swc-10-btn-block">
            <div class="swc-10-button transit-300 win-moving14 swc-item" data-next="<?=CalculatorWidget::TYPE_CALCULATION?>">
                Посчитать команду самому
            </div>
            <div class="swc-10-button transit-300 swc-item" data-page="<?=CalculatorWidget::FROM_CALCULATOR_INTERNET_SERVICE?>" data-next="<?=CalculatorWidget::TYPE_SEND_FORM?>">
                Получить детальный расчёт
            </div>
        </div>
    </div>
</div>