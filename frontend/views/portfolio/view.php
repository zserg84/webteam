<?
use frontend\widgets\statement\StatementWidget;
use frontend\assets\AppAssetPortfolioView;
use common\models\StatementLetter;
use yii\helpers\Url;
use frontend\components\Helper;

AppAssetPortfolioView::register($this);

$backUrl = Url::toRoute(['/portfolio/index/']);
?>
<div class="top-section transit-1000">

	<div class="btn-back-block">
            <a href="<?=$backUrl?>" class="transit-300">
                <div class="arrow-icon">
                    <img src="/page/portfolio/view/style/images/arrow-back.png" alt="">
                </div>
                <div class="btn-name">
                    <?=Helper::t('portfolio', 'BACK_BUTTON_1')?>
                </div>
            </a>
    </div>

    <div class="view-title">
        <?=$model->title?>
    </div>
    <div class="view-sub-title">
        <?=$model->subtitle?>
    </div>
    <div class="view-description-container">
        <?=$model->description?>
    </div>

    <div class="printscreen-container">
        <?foreach($model->portfolioImages as $portfolioImage):?>
            <img src="<?=$portfolioImage->image->getSrc()?>" alt="" class="i-screen">
        <?endforeach?>

    </div>

	<div class="btn-back-block text-center">
            <a href="<?=$backUrl?>" class="transit-300">
                <?=Helper::t('portfolio', 'BACK_BUTTON_2')?>
            </a>
    </div>

</div>

<?=StatementWidget::widget([
    'from' => StatementLetter::getFromValue(StatementLetter::FROM_PORTFOLIO_FLY) . ' ('.$model->title.')'
])?>

<?
$this->registerJs('
    (function() {
        [].slice.call( document.querySelectorAll( "select.cs-select") ).forEach( function(el) {
            new SelectFx(el);
        } );
    })();
', \yii\web\View::POS_END);
?>