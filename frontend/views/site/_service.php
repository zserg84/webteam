<?
use yii\helpers\Url;

$services = [
    [
        'title' => 'Команды под<br>крупные проекты',
    ],
    [
        'title' => 'Cайты и сервисы',
    ],
    [
        'title' => 'Мобильные<br>приложения',
    ],
    [
        'title' => 'Сенсорные экраны',
    ],
    [
        'title' => 'Social Media Marketing',
    ],
    [
        'title' => 'Презентации<br>и фирменные стили',
    ],
];
?>
<div class="row-container bg-dark first-margin" id="services">
    <div class="rc-title">
        <h3>Наши услуги</h3>
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
            узнать подробнее
        </a>
    </div>
</div>