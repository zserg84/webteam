<?
use frontend\widgets\statement\StatementWidget;
use yii\helpers\Url;

\frontend\assets\AppAssetPortfolio::register($this);
?>

<section>

    <div class="top-section transit-1000">
        С 2001 года мы реализовали более 100 проектов в сфере цифровых коммуникаций. <br>Ниже представлены некоторые из наших проектов.
    </div>

    <div class="portfolio-content transit-1000">
        <?foreach($portfolios as $k=>$portfolio):
            $index = $k+1;
            $image = $portfolio->image;
            ?>
            <a href="<?=Url::toRoute(['view', 'id'=>$portfolio->alias])?>" class="portfolio-item transit-1000">
                <div class="pi-block">
                    <div class="pi-block-cell">
                        <img src="<?=$image ? $image->getSrc() : '' ?>" alt="" class="item-img-background transit-300">
                        <div class="pi-inner transit-300"></div>
                        <div class="pi-cell-top">
                            <div class="pi-item-name transit-300">
                                <?=$portfolio->title?>
                            </div>
                        </div>
                        <div class="pi-cell-bottom">
                            <div class="pi-item-description transit-300">
                                <?=$portfolio->subtitle?>
                            </div>
                        </div>

                    </div>
                </div>
            </a>
        <?endforeach?>

        <!---->
        <a class="portfolio-item"></a>
        <!---->

    </div>

</section>

<?=StatementWidget::widget([
    'from' => \common\models\StatementLetter::getFromValue(\common\models\StatementLetter::FROM_PORTFOLIO_FLY)
])?>

<div class="to-top-container transit-300">
    <div class="icon-arrow">
        <img src="<?=Yii::getAlias('@web').'/page/portfolio/style/images/i_top.png'; ?>" alt="">
    </div>
    <div class="text-cont">
        вверх
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