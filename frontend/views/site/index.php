<?
use yii\helpers\Url;
use frontend\assets\AppAssetMain;
use frontend\widgets\statement\StatementWidget;
use common\models\StatementLetter;

AppAssetMain::register($this);

$this->title = 'Создаем команды под крупные проекты';
?>
<!--<section>-->

<div class="welcome-container">
    <div class="wc-lamp-block">
        <img src="<?echo Yii::getAlias('@web').'/style/images/i_first-container/lamp.png'; ?>" alt="" class="ilamp">
        <div class="wcl-text">
            <img src="<?echo Yii::getAlias('@web').'/style/images/i_first-container/lamp-text.png'; ?>" alt="" class="iwcl-text">
        </div>
    </div>
    <div class="wc-title-block">
        <div class="wct-title">
            <h1>
                <span class="wctt-1">Cоздаем команды</span><br>
                <span class="wctt-2">под</span>
                <span class="wctt-3"><a href="<?=Url::toRoute(['/service/index']).'#item1'?>" class="transit-300">крупные проекты</a></span>
            </h1>
        </div>
        <div class="wc-button" id="wc-button">
            <a href="#contacts" class="wcb-demand transit-300">
                оставить заявку
            </a>
        </div>
        <div class="wct-download-block">
            <a href="files/presentation.pdf" target="_blank" download class="wct-download-link">
                <div class="wctl-icon-file">
                    <img src="<?echo Yii::getAlias('@web').'/style/images/i_first-container/icon-file.png'; ?>" alt="">
                </div>
                <div class="wctl-right">
                    <div class="download-link-title transit-300">
                        Скачать презентацию
                    </div>
                    <div class="info-file-size">
                        5.3 мб
                    </div>
                </div>
                <div class="clearfix"></div>
            </a>
        </div>
    </div>
    <div class="wc-right-element">
        <a class="wcr-element wcr-real transit-300">
            <div class="wcr-element-icon icon-1"></div>
            <div class="wcr-element-name">
                перейти в дополненную реальность
            </div>
            <div class="clearfix"></div>
        </a>
        <a href="https://www.facebook.com/WebTeam.PRO" target="_blank" class="wcr-element transit-300">
            <div class="wcr-element-icon icon-2"></div>
            <div class="wcr-element-name">
                смотрите все новости на Facebook
                <div class="fb-like-icon">
                    <img src="<?echo Yii::getAlias('@web').'/style/images/i_first-container/right-flip-icon-3.png'; ?>" alt="">
                </div>
            </div>
            <div class="clearfix"></div>
        </a>
    </div>
</div>



<?

echo $this->render('_service');

echo $this->render('_portfolio', [
    'portfolios' => $portfolios,
]);

echo $this->render('_team', [
    'team' => $team,
]);

echo $this->render('_recall', [
    'recalls' => $recalls,
])?>

<!--</section>-->
<footer>

    <div class="row-container bg-footer footer-block" id="contacts">
        <div class="rc-title footer-title">
            <h3>Контакты</h3>
        </div>
        <div class="footer-lamp-block">
            <img src="<?echo Yii::getAlias('@web').'/style/images/i_contacts/footer-lamp.png'; ?>" alt="">
        </div>
        <div class="footer-container">
            <div class="fc-form-title">
                <div class="fcf-cell fcf-1">
                    <div class="fcf-name">
                        Контактный телефон
                    </div>
                    <div class="fcf-description">
                        <a href="tel:88007754523">8 (800) 200-91-88</a>
                    </div>
                </div>
                <div class="fcf-cell fcf-2">
                    <div class="fcf-name">
                        Skype
                    </div>
                    <div class="fcf-description">
                        <a href="skype:yaxonmax?call">yaxonmax</a>
                    </div>
                </div>
                <div class="fcf-cell">
                    <div class="fcf-name">
                        E-mail
                    </div>
                    <div class="fcf-description">
                        <a href="mailto:info@webteam.pro">info@webteam.pro</a>
                    </div>
                </div>
            </div>
            <?echo $this->render('_statement_form')?>
        </div>
    </div>

</footer>

<?echo StatementWidget::widget([
    'from' => StatementLetter::getFromValue(StatementLetter::FROM_MAIN_FLY),
    'isMainPage' => true,
])?>

<div class="real-container transit-800">
    <div class="real-btn-close transit-300">
        <img src="<?echo Yii::getAlias('@web').'/style/images/i_real-container/real-close.png'; ?>" alt="" class="transit-300">
    </div>
    <div class="real-container-title">
        Наведитесь прицелом на логотип
    </div>
    <div class="real-cont-logo">
        <img src="<?echo Yii::getAlias('@web').'/style/images/i_real-container/logo-real.png'; ?>" alt="">
    </div>
    <div class="real-cont-bottom-left">
        <div class="rcb-title">
            Приложение
        </div>
        <div class="rcb-name">
            Дополненная реальность
        </div>
        <div class="rcb-icon">
            <img src="<?echo Yii::getAlias('@web').'/style/images/i_real-container/app-icon.png'; ?>" alt="">
        </div>
    </div>
    <div class="real-cont-bottom-center">
        <div class="rcb-apps">
            <div class="rcb-app-googleplay">
                <a href="https://play.google.com/store/apps/details?id=com.webteam.webteamcard" target="_blank" class="transit-300">
                    Скачать с GooglePlay
                </a>
            </div>
            <div class="rcb-app-applestore">
                <a href="https://itunes.apple.com/ru/app/webteam/id719462503" target="_blank" class="transit-300"></a>
            </div>
        </div>
    </div>
    <div class="real-cont-bottom-right">
        <img src="<?echo Yii::getAlias('@web').'/style/images/i_real-container/qr-code.png'; ?>" alt="">
    </div>
</div>


<?
$this->registerJs('
    (function() {
        [].slice.call( document.querySelectorAll( "select.cs-select") ).forEach( function(el) {
            new SelectFx(el);
        } );
    })();
', \yii\web\View::POS_END);
?>