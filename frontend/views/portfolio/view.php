<?
use frontend\widgets\statement\StatementWidget;
use frontend\assets\AppAssetPortfolioView;
use common\models\StatementLetter;

AppAssetPortfolioView::register($this);
?>
<div class="top-section transit-1000">

	<div class="btn-back-block">
            <a href="../" class="transit-300">
                <div class="arrow-icon">
                    <img src="/page/portfolio/view/style/images/arrow-back.png" alt="">
                </div>
                <div class="btn-name">
                    Назад
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