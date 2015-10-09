<?
use yii\helpers\Url;
?>
<div class="row-container bg-white" id="portfolio">
    <div class="rc-title">
        <h3>Портфолио</h3>
    </div>
    <div class="portfolio-content">
        <div class="portfolio-catalog upper">
            <?for($k=0; $k<count($portfolios) && $k<3;$k++):
                $portfolio = $portfolios[$k];
                $index = $k+1;
                $image = $portfolio->image;
                ?>
                <div class="port-upper-cell port-cell-<?=$index?>" id="port-cell-<?=$index?>">
                    <a href="<?=Url::toRoute(['/portfolio/view', 'id'=>$portfolio->id])?>"
                       class="portfolio-shading port-upper-shad transit-300"
                       style="background: url('<?=$image ? $image->getSrc() : '' ?>');">
                        <div class="port-shad-block transit-300">
                            <div class="port-50-top">
                                <div class="portfolio-title transit-300">
                                    <?=$portfolio->title?>
                                </div>
                            </div>
                            <div class="port-50-bottom">
                                <div class="portfolio-description transit-300">
                                    <?=$portfolio->subtitle?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?endfor?>
        </div>
        <div class="portfolio-catalog lower">
            <?for($k=3; $k<count($portfolios) && $k<5;$k++):
                $portfolio = $portfolios[$k];
                $index = $k+1;
                $image = $portfolio->image;
                ?>
                <div class="port-upper-cell port-cell-<?=$index?>" id="port-cell-<?=$index?>">
                    <a href="<?=Url::toRoute(['/portfolio/view', 'id'=>$portfolio->id])?>"
                       class="portfolio-shading port-upper-shad transit-300"
                       style="background: url('<?=$image ? $image->getSrc() : '' ?>');">
                        <div class="port-shad-block transit-300">
                            <div class="port-50-top">
                                <div class="portfolio-title transit-300">
                                    <?=$portfolio->title?>
                                </div>
                            </div>
                            <div class="port-50-bottom">
                                <div class="portfolio-description transit-300">
                                    <?=$portfolio->subtitle?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?endfor?>
        </div>
    </div>
    <div class="portfolio-content-mobile">
        <div class="portfolio-slides">
            <ul class="slides">
                <?foreach($portfolios as $k=>$portfolio):
                    $index = $k+1;
                    $image = $portfolio->image;
                    ?>
                    <li>
                        <div class="item-port">
                            <a href="<?=Url::toRoute(['/portfolio/view', 'id'=>$portfolio->id])?>" class="item-container-port" style="background: url('<?=$image ? $image->getSrc() : '' ?>');">
                                <div class="icp-block">
                                    <div class="icp-block-cell">
                                        <div class="icp-inner"></div>
                                        <div class="icp-container">
                                            <div class="icp-title">
                                                <?=$portfolio['title']?>
                                            </div>
                                            <div class="icp-description">
                                                <?=$portfolio['subtitle']?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </li>
                <?endforeach?>
            </ul>
        </div>
    </div>
    <div class="portfolio-button-more">
        <a href="<?=Url::toRoute(['/portfolio/index'])?>" class="pb-btn-more transit-300">
            Посмотреть все
        </a>
    </div>
</div>