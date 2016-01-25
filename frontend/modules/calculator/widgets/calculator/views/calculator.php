<?
use yii\widgets\Pjax;
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
use frontend\modules\calculator\widgets\calculator\Asset;
?>
<div class="tb-btn-calc blink-btn-calc transit-300" >
    <div class="calc-icon">
        <img src="<?=Asset::imgSrc("c-icon.png")?>" alt="">
    </div>
    <div class="calc-context">
        Узнай стоимость своего проекта
    </div>
    <div class="tb-btn-calc-tooltip">
        Узнай стоимость своего проекта
        <img src="<?=Asset::imgSrc("arrow-info-tooltip.png")?>" alt="">
    </div>
    <div class="clearfix"></div>
</div>

<div class="calculator-container">

    <div class="calculator-aligning-container">
        <div class="calculator-aligning-cell">

            <div class="substrate-window">

                <div class="calc-close">
                    <img src="<?=Asset::imgSrc("c-close/close.png")?>" alt="" class="c-close-default transit-300">
                    <img src="<?=Asset::imgSrc("c-close/close-hover.png")?>" alt="" class="c-close-active transit-300">
                </div>

                <div class="window-overlapping"></div>

                <?Pjax::begin(['id' => 'pjax-calculator-container', 'enablePushState' => false])?>
                <?
                switch($type){
                    case CalculatorWidget::TYPE_START:
                        echo $this->render('_start_window');
                        break;
                    case CalculatorWidget::TYPE_2_DESIGN_FIRSTYLE:
                        echo $this->render('_window_2_design_firstyle');
                        break;
                    case CalculatorWidget::TYPE_2_MOBILE:
                        echo $this->render('_window_2_mobile');
                        break;
                    case CalculatorWidget::TYPE_2_WEBSITE:
                        echo $this->render('_window_2_website');
                        break;
                    case CalculatorWidget::TYPE_3_CORP_SITE:
                        echo $this->render('_window_3_corp_site');
                        break;
                    case CalculatorWidget::TYPE_3_DESIGN:
                        echo $this->render('_window_3_design');
                        break;
                    case CalculatorWidget::TYPE_3_FIRSTYLE:
                        echo $this->render('_window_3_firstyle');
                        break;
                    case CalculatorWidget::TYPE_3_INTERNET_SERVICE:
                        echo $this->render('_window_3_internet_service');
                        break;
                    case CalculatorWidget::TYPE_3_INTERNET_STORE:
                        echo $this->render('_window_3_internet_store');
                        break;
                    case CalculatorWidget::TYPE_3_LANDING:
                        echo $this->render('_window_3_landing');
                        break;
                    case CalculatorWidget::TYPE_3_SOC_NETWORK:
                        echo $this->render('_window_3_soc_network');
                        break;
                    case CalculatorWidget::TYPE_4_SOC_NETWORK:
                        echo $this->render('_window_4_soc_network');
                        break;
                    case CalculatorWidget::TYPE_CALCULATION:
                        echo $this->render('_window_calculation');
                        break;
                    case CalculatorWidget::TYPE_SEND_FORM:
                        echo $this->render('_window_send_form',[
                            'page' => Yii::$app->getRequest()->get('page')
                        ]);
                        break;
                    case CalculatorWidget::TYPE_SEND_EMAIL_FORM:
                        echo $this->render('_window_email_form', [
                            'page' => Yii::$app->getRequest()->get('page')
                        ]);
                        break;
                }
                ?>
                <?Pjax::end()?>
            </div>

        </div>
    </div>

</div>