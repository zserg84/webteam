<?
use yii\helpers\Url;
use frontend\components\Helper;

$services = [
    [
        'title' => Helper::t('main', 'TEAMS_FOR_PROJECTS'),
    ],
    [
        'title' => Helper::t('main', 'SITES_AND_SERVICES'),
    ],
    [
        'title' => Helper::t('main', 'MOBILE_APPS'),
    ],
    [
        'title' => Helper::t('main', 'SENSOR_SCREENS'),
    ],
    [
        'title' => Helper::t('main', 'SMM'),
    ],
    [
        'title' => Helper::t('main', 'PRESENTATIONS'),
    ],
];
?>
<div class="row-container bg-dark first-margin" id="services">
    <div class="rc-title">
        <h3><?=Helper::t('main', 'OURSERVICES_HEADER')?></h3>
    </div>
    <div class="services-content">
        <?foreach($services as $k=>$service):
            $index = $k+1;
            $url = Url::toRoute(['/service/index']) . '#item'.$index;
            ?>
            <a href="<?=$url?>" class="sc-item">
                <div class="sc-item-icon sc-icon-ef-<?=$index?>">
                    <div class="item-bg-circle">
                        <img src="<?=Yii::getAlias('@web').'/style/images/i_services/circle.png'; ?>" alt="">
                    </div>
                    <img src="<?=Yii::getAlias('@web').'/style/images/i_services/service-'.$index.'.png'; ?>" alt="">
                    <div class="inner-bg">
                        <img src="<?=Yii::getAlias('@web').'/style/images/i_services/service-hover.png'; ?>" alt="" class="transit-300">
                    </div>
                </div>
                <div class="sc-item-name sc-name-ef-<?=$index?> transit-300">
                    <?=$service['title']?>
                </div>
            </a>
        <?endforeach?>
    </div>
    <div class="services-button-more">
        <a href="<?=Url::toRoute(['service/index'])?>" class="sr-btn-more transit-300">
            <?=Helper::t('main', 'LEARNMORE_BUTTON')?>
        </a>
    </div>
</div>