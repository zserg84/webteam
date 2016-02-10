<?
use frontend\assets\AppAssetService;
use yii\helpers\Url;
use frontend\components\Helper;
use common\models\Lang;

AppAssetService::register($this);
?>
<section>

    <div class="top-section transit-1000">
        <div class="s-item s-1 transit-1000">
            <a href="#item1" class="s-item-title" id="item1">
                <div class="sit-bg service-background_1 transit-500"></div>
                <div class="sit-inner inner-first transit-300"></div>
                <div class="sit-block">
                    <div class="sit-block-cell">
                        <div class="sit-cell-container transit-300">
                            <div class="sit-first-service-title">
                                <div class="sfs-title">
                                    <div class="sfs-title-name">
                                        <?=Helper::t('ourservices', 'TEAMS_FOR_PROJECTS')?>
                                    </div>
                                </div>
                                <div class="sfs-content-1">
                                    <?=Helper::t('ourservices', 'SFS_CONTENT_1')?>
                                </div>
                                <div class="sfs-content-2">
                                    <?=Helper::t('ourservices', 'SFS_CONTENT_2')?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <div class="s-item-description">
                <div class="sid-item-1">
                    <div class="sid-title-why">
                        <?=Helper::t('ourservices', 'TITLE_WHY')?>
                    </div>
                    <div class="sid-list-why">
                        <div class="list-why-item">
                            <div class="lwi-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-1/icon-plus.png'; ?>" alt="">
                            </div>
                            <div class="lwi-desc">
                                <div class="lwi-desc-content">
                                    <?=Helper::t('ourservices', 'LIST_WHY_CONTENT_1')?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="list-why-item">
                            <div class="lwi-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-1/icon-plus.png'; ?>" alt="">
                            </div>
                            <div class="lwi-desc">
                                <div class="lwi-desc-content">
                                    <?=Helper::t('ourservices', 'LIST_WHY_CONTENT_2')?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="list-why-item">
                            <div class="lwi-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-1/icon-plus.png'; ?>" alt="">
                            </div>
                            <div class="lwi-desc">
                                <div class="lwi-desc-content">
                                    <?=Helper::t('ourservices', 'LIST_WHY_CONTENT_3')?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="list-why-item">
                            <div class="lwi-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-1/icon-plus.png'; ?>" alt="">
                            </div>
                            <div class="lwi-desc">
                                <div class="lwi-desc-content">
                                    <?=Helper::t('ourservices', 'LIST_WHY_CONTENT_4')?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="sid-result">
                        <div class="sid-res-title">
                            <?=Helper::t('ourservices', 'RES_TITLE_1')?>
                        </div>
                        <div class="sid-res-list">
                            <div class="srl-item">
                                <div class="srl-icon srl-1"></div>
                                <div class="srl-content">
                                    <div class="srl-cont-block">
                                        <div class="srl-cont-cell">
                                            <?=Helper::t('ourservices', 'LIST_RES_CONTENT_1')?>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="srl-item">
                                <div class="srl-icon srl-2"></div>
                                <div class="srl-content">
                                    <div class="srl-cont-block">
                                        <div class="srl-cont-cell">
                                            <?=Helper::t('ourservices', 'LIST_RES_CONTENT_2')?>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="srl-item">
                                <div class="srl-icon srl-3"></div>
                                <div class="srl-content">
                                    <div class="srl-cont-block">
                                        <div class="srl-cont-cell">
                                            <?=Helper::t('ourservices', 'LIST_RES_CONTENT_3')?>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="srl-item">
                                <div class="srl-icon srl-4"></div>
                                <div class="srl-content">
                                    <div class="srl-cont-block">
                                        <div class="srl-cont-cell">
                                            <?=Helper::t('ourservices', 'LIST_RES_CONTENT_4')?>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <?
                    $lang = Lang::getCurrent();
                    if($lang->url == 'ru'){
                        $projects = [
                            1=>Yii::getAlias('@web').'/page/services/style/images/i_service-1/icon-example-1-name.png',
                            2=>Yii::getAlias('@web').'/page/services/style/images/i_service-1/icon-example-2-name.png',
                            3=>Yii::getAlias('@web').'/page/services/style/images/i_service-1/icon-example-3-name.png',
                            4=>Yii::getAlias('@web').'/page/services/style/images/i_service-1/icon-example-4-name.png'
                        ];
                    }
                    else{
                        $projects = [
                            1=>Yii::getAlias('@web').'/page/services/style/images/i_service-1/icon-example-1-name.png',
                            5=>Yii::getAlias('@web').'/page/services/style/images/i_service-1/icon-example-5-name.png',
                        ];
                    }

                    ?>
                    <div class="sid-example">
                        <div class="sid-res-title">
                            <?=Helper::t('ourservices', 'RES_TITLE_2')?>
                        </div>
                        <div class="sid-res-list">
                            <?foreach($projects as $index=>$project):
                                ?>
                                <div class="srl-item">
                                    <div class="srl-icon srl-<?=$index?>"></div>
                                    <div class="srl-content">
                                        <div class="srl-cont-block">
                                            <div class="srl-cont-cell">
                                                <img src="<?=$project?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            <?endforeach?>
                        </div>
                    </div>
                    <div class="wt-button-block">
                        <div class="wt-btn-ser transit-300" data-service="project">
                            <?=Helper::t('ourservices', 'SERVICE_BUTTON')?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="s-item s-2 transit-1000">
            <a href="#item2" class="s-item-title" id="item2">
                <div class="sit-bg service-background_2 transit-500"></div>
                <div class="sit-inner inner-second transit-300"></div>
                <div class="sit-block">
                    <div class="sit-block-cell">
                        <div class="sit-cell-container transit-300">

                            <div class="sit-second-service-title sst-left">
                                <div class="st-title">
                                    <?=Helper::t('ourservices', 'WEBSITE_DEVELOPMENT')?>
                                </div>
                                <div class="st-description">
                                    <?=Helper::t('ourservices', 'WEBSITE_CONTENT_1')?>
                                </div>
                                <div class="st-description">
                                    <?=Helper::t('ourservices', 'WEBSITE_CONTENT_2')?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </a>
            <div class="s-item-description">
                <div class="sid-item-2">
                    <div class="sid-devel-title">
                        <?=Helper::t('ourservices', 'DEVELOPMENT_TITLE')?>
                    </div>
                    <div class="sid-devel-why">
                        <div class="devel-why-list">
                            <ul>
                                <li>
                                    <?=Helper::t('ourservices', 'LIST_DEV_CONTENT_1')?>
                                </li>
                                <li>
                                    <?=Helper::t('ourservices', 'LIST_DEV_CONTENT_2')?>
                                </li>
                                <li>
                                    <?=Helper::t('ourservices', 'LIST_DEV_CONTENT_3')?>
                                </li>
                            </ul>
                        </div>
                        <div class="icon-block-why">
                            <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-2/icon-1.png'; ?>" alt="">
                        </div>
                    </div>
                    <div class="sid-devel-why">
                        <div class="icon-block-why">
                            <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-2/icon-2.png'; ?>" alt="">
                        </div>
                        <div class="devel-why-list">
                            <ul>
                                <li>
                                    <?=Helper::t('ourservices', 'LIST_DEV_CONTENT_4')?>
                                </li>
                                <li>
                                    <?=Helper::t('ourservices', 'LIST_DEV_CONTENT_5')?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="sid-devel-title in-cont-ttl">
                        <?=Helper::t('ourservices', 'SUCCESS_TITLE')?>
                    </div>
                    <div class="sid-devel-why marg-none">
                        <div class="icon-block-why">
                            <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-2/icon-3.png'; ?>" alt="">
                        </div>
                        <div class="devel-why-list devel-progress">
                            <ul>
                                <li>
                                    <div class="devel-list-num">
                                        1
                                    </div>
                                    <div class="devel-list-dsk">
                                        <?=Helper::t('ourservices', 'SUCCESS_CONTENT_1')?>
                                    </div>
                                </li>
                                <li>
                                    <div class="devel-list-num">
                                        2
                                    </div>
                                    <div class="devel-list-dsk">
                                        <?=Helper::t('ourservices', 'SUCCESS_CONTENT_2')?>
                                    </div>
                                </li>
                                <li>
                                    <div class="devel-list-num">
                                        3
                                    </div>
                                    <div class="devel-list-dsk">
                                        <?=Helper::t('ourservices', 'SUCCESS_CONTENT_3')?>
                                    </div>
                                </li>
                                <li>
                                    <div class="devel-list-num">
                                        4
                                    </div>
                                    <div class="devel-list-dsk">
                                        <?=Helper::t('ourservices', 'SUCCESS_CONTENT_4')?>
                                    </div>
                                </li>
                                <li>
                                    <div class="devel-list-num">
                                        5
                                    </div>
                                    <div class="devel-list-dsk">
                                        <?=Helper::t('ourservices', 'SUCCESS_CONTENT_5')?>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="wt-button-block">
                        <div class="wt-btn-ser transit-300" data-service="web">
                            <?=Helper::t('ourservices', 'SERVICE_BUTTON')?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="s-item s-3 transit-1000">
            <a href="#item3" class="s-item-title s-painted" id="item3">
                <div class="sit-bg service-background_3 transit-500"></div>
                <div class="sit-inner inner-painted transit-300"></div>
                <div class="sit-block">
                    <div class="sit-block-cell">
                        <div class="sit-cell-container transit-300">

                            <div class="sit-second-service-title sst-left">
                                <div class="st-title">
                                    <?=Helper::t('ourservices', 'MOBILE_APPS_TITLE')?>
                                </div>
                                <div class="st-description">
                                    <?=Helper::t('ourservices', 'MOBILE_CONTENT_1')?>
                                </div>
                                <div class="st-description">
                                    <?=Helper::t('ourservices', 'MOBILE_CONTENT_2')?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </a>
            <div class="s-item-description">
                <div class="sid-item-3">
                    <div class="mob-title">
                        <?=Helper::t('ourservices', 'MOBILE_WHAT_TITLE')?>
                    </div>
                    <div class="mob-we-do-why">
                        <div class="col-xs-12 no-pad">
                            <div class="col-xs-6 no-pad">
                                <div class="mob-os-block">
                                    <div class="mob-os-icon">
                                        <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-3/icon-1.png'; ?>" alt="">
                                    </div>
                                    <div class="mob-os-name">
                                        <?=Helper::t('ourservices', 'MOBILE_IOS_TITLE')?>
                                    </div>
                                </div>
                                <div class="mob-os-description">
                                    <?=Helper::t('ourservices', 'MOBILE_IOS_CONTENT')?>
                                </div>
                            </div>
                            <div class="col-xs-6 no-pad">
                                <div class="mob-os-block">
                                    <div class="mob-os-icon">
                                        <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-3/icon-2.png'; ?>" alt="">
                                    </div>
                                    <div class="mob-os-name">
                                        <?=Helper::t('ourservices', 'MOBILE_ANDROID_TITLE')?>
                                    </div>
                                </div>
                                <div class="mob-os-description no-right">
                                    <?=Helper::t('ourservices', 'MOBILE_ANDROID_CONTENT')?>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="mob-title mt-second">
                        <?=Helper::t('ourservices', 'MOBILE_HOW_TITLE')?>
                    </div>
                    <div class="mob-we-made">
                        <div class="mvm-item">
                            <div class="mvm-more-width">
                                <div class="mvm-title">
                                    <?=Helper::t('ourservices', 'MOBILE_CONCEPT')?>
                                </div>
                                <div class="mvm-content">
                                    <ul>
                                        <li>
                                            <?=Helper::t('ourservices', 'MOBILE_CONCEPT_CONTENT_1')?>
                                        </li>
                                        <li>
                                            <?=Helper::t('ourservices', 'MOBILE_CONCEPT_CONTENT_2')?>
                                        </li>
                                        <li>
                                            <?=Helper::t('ourservices', 'MOBILE_CONCEPT_CONTENT_3')?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mvm-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-3/icon-3.png'; ?>" alt="">
                            </div>
                        </div>
                        <div class="mvm-item">
                            <div class="mvm-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-3/icon-4.png'; ?>" alt="">
                            </div>
                            <div class="mvm-more-width">
                                <div class="mvm-title">
                                    <?=Helper::t('ourservices', 'MOBILE_DESIGN')?>
                                </div>
                                <div class="mvm-content">
                                    <ul>
                                        <li>
                                            <?=Helper::t('ourservices', 'MOBILE_DESIGN_CONTENT_1')?>
                                        </li>
                                        <li>
                                            <?=Helper::t('ourservices', 'MOBILE_DESIGN_CONTENT_2')?>
                                        </li>
                                        <li>
                                            <?=Helper::t('ourservices', 'MOBILE_DESIGN_CONTENT_3')?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="mvm-item">
                            <div class="mvm-more-width">
                                <div class="mvm-title">
                                    <?=Helper::t('ourservices', 'MOBILE_PROGRAMMING')?>
                                </div>
                            </div>
                            <div class="mvm-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-3/icon-5.png'; ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="wt-button-block">
                        <div class="wt-btn-ser transit-300" data-service="mobile">
                            <?=Helper::t('ourservices', 'SERVICE_BUTTON')?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="s-item s-4 transit-1000">
            <a href="#item4" class="s-item-title" id="item4">
                <div class="sit-bg service-background_4 transit-500"></div>
                <div class="sit-inner inner-second transit-300"></div>
                <div class="sit-block">
                    <div class="sit-block-cell">
                        <div class="sit-cell-container transit-300">

                            <div class="sit-second-service-title sst-left">
                                <div class="st-title">
                                    <?=Helper::t('ourservices', 'MOBILE_TOUCH_TITLE')?>
                                </div>
                                <div class="st-description">
                                    <?=Helper::t('ourservices', 'MOBILE_TOUCH_CONTENT')?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </a>
            <div class="s-item-description">
                <div class="sid-item-4">
                    <div class="sens-title">
                        <?=Helper::t('ourservices', 'MOBILE_TOUCH_SITUATION_QUESTION')?>
                    </div>
                    <div class="sens-client">
                        <div class="sc-desk">
                            <div class="scd-title">
                                <?=Helper::t('ourservices', 'MOBILE_TOUCH_SITUATION_1')?>
                            </div>
                            <ul>
                                <li>
                                    <?=Helper::t('ourservices', 'MOBILE_TOUCH_SITUATION_LIST_1')?>
                                </li>
                                <li>
                                    <?=Helper::t('ourservices', 'MOBILE_TOUCH_SITUATION_LIST_2')?>
                                </li>
                                <li>
                                    <?=Helper::t('ourservices', 'MOBILE_TOUCH_SITUATION_LIST_3')?>
                                </li>
                            </ul>
                        </div>
                        <div class="sc-icon">
                            <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-4/icon-0.png'; ?>" align="">
                        </div>
                        <div class="scd-title-bottom">
                            <?=Helper::t('ourservices', 'MOBILE_TOUCH_SITUATION_2')?>
                        </div>
                    </div>
                    <div class="sens-title st-second">
                        <?=Helper::t('ourservices', 'MOBILE_TOUCH_NEEDED_QUESTION')?>
                    </div>
                    <div class="sens-claim-block">
                        <div class="sens-claim-cell">
                            <div class="sc-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-4/icon-1.png'; ?>" align="">
                            </div>
                            <div class="sc-name">
                                <?=Helper::t('ourservices', 'MOBILE_TOUCH_NEEDED_1')?>
                            </div>
                        </div>
                        <div class="sens-claim-cell">
                            <div class="sc-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-4/icon-2.png'; ?>" align="">
                            </div>
                            <div class="sc-name">
                                <?=Helper::t('ourservices', 'MOBILE_TOUCH_NEEDED_2')?>
                            </div>
                        </div>
                        <div class="sens-claim-cell">
                            <div class="sc-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-4/icon-3.png'; ?>" align="">
                            </div>
                            <div class="sc-name">
                                <?=Helper::t('ourservices', 'MOBILE_TOUCH_NEEDED_3')?>
                            </div>
                        </div>
                        <div class="sens-claim-cell">
                            <div class="sc-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-4/icon-4.png'; ?>" align="">
                            </div>
                            <div class="sc-name">
                                <?=Helper::t('ourservices', 'MOBILE_TOUCH_NEEDED_4')?>
                            </div>
                        </div>
                        <div class="sens-claim-cell">
                            <div class="sc-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-4/icon-5.png'; ?>" align="">
                            </div>
                            <div class="sc-name">
                                <?=Helper::t('ourservices', 'MOBILE_TOUCH_NEEDED_5')?>
                            </div>
                        </div>
                        <div class="sens-claim-cell">
                            <div class="sc-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-4/icon-6.png'; ?>" align="">
                            </div>
                            <div class="sc-name">
                                <?=Helper::t('ourservices', 'MOBILE_TOUCH_NEEDED_6')?>
                            </div>
                        </div>
                        <div class="sens-claim-cell">
                            <div class="sc-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-4/icon-7.png'; ?>" align="">
                            </div>
                            <div class="sc-name">
                                <?=Helper::t('ourservices', 'MOBILE_TOUCH_NEEDED_7')?>
                            </div>
                        </div>
                    </div>
                    <div class="sens-title st-second">
                        <?=Helper::t('ourservices', 'MOBILE_TOUCH_GAIN_TITLE')?>
                    </div>
                    <div class="sens-result">
                        <div class="sr-block">
                            <div class="sr-description">
                                <div class="sr-dsk-title">
                                    <?=Helper::t('ourservices', 'MOBILE_TOUCH_SALES_GROWTH')?>
                                </div>
                                <ul class="sr-dsk-cont">
                                    <li>
                                        <?=Helper::t('ourservices', 'MOBILE_TOUCH_SALES_LIST_1')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'MOBILE_TOUCH_SALES_LIST_2')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'MOBILE_TOUCH_SALES_LIST_3')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'MOBILE_TOUCH_SALES_LIST_4')?>
                                    </li>
                                </ul>
                            </div>
                            <div class="sr-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-4/icon-8.png'; ?>" align="">
                            </div>
                        </div>
                        <div class="sr-block">
                            <div class="sr-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-4/icon-9.png'; ?>" align="">
                            </div>
                            <div class="sr-description">
                                <div class="sr-dsk-title">
                                    <?=Helper::t('ourservices', 'MOBILE_TOUCH_INNOVATION')?>
                                </div>
                                <ul class="sr-dsk-cont">
                                    <li>
                                        <?=Helper::t('ourservices', 'MOBILE_TOUCH_INNOVATION_LIST_1')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'MOBILE_TOUCH_INNOVATION_LIST_2')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'MOBILE_TOUCH_INNOVATION_LIST_3')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'MOBILE_TOUCH_INNOVATION_LIST_4')?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sr-block">
                            <div class="sr-description">
                                <div class="sr-dsk-title">
                                    <?=Helper::t('ourservices', 'MOBILE_TOUCH_COST_REDUCTION')?>
                                </div>
                                <ul class="sr-dsk-cont">
                                    <li>
                                        <?=Helper::t('ourservices', 'MOBILE_TOUCH_COST_LIST_1')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'MOBILE_TOUCH_COST_LIST_2')?>
                                    </li>
                                </ul>
                            </div>
                            <div class="sr-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-4/icon-10.png'; ?>" align="">
                            </div>
                        </div>
                    </div>
                    <div class="wt-button-block">
                        <div class="wt-btn-ser transit-300" data-service="sensor">
                            <?=Helper::t('ourservices', 'SERVICE_BUTTON')?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="s-item s-5 transit-1000">
            <a href="#item5" class="s-item-title s-painted" id="item5">
                <div class="sit-bg service-background_5 transit-500"></div>
                <div class="sit-inner inner-painted transit-300"></div>
                <div class="sit-block">
                    <div class="sit-block-cell">
                        <div class="sit-cell-container transit-300">

                            <div class="sit-second-service-title sst-left">
                                <div class="st-title">
                                    <?=Helper::t('ourservices', 'SMM_TITLE')?>
                                </div>
                                <div class="st-description">
                                    <?=Helper::t('ourservices', 'SMM_CONTENT_1')?>
                                </div>
                                <div class="st-description">
                                    <?=Helper::t('ourservices', 'SMM_CONTENT_2')?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </a>
            <div class="s-item-description">
                <div class="sid-item-5">
                    <div class="smm-title">
                        <?=Helper::t('ourservices', 'SMM_PROMOTION')?>
                    </div>
                    <div class="smm-advance-block">
                        <div class="smm-advance-item">
                            <div class="smm-advance-content">
                                <div class="smm-advance-title">
                                    <?=Helper::t('ourservices', 'SMM_STRATEGY')?>
                                </div>
                                <ul>
                                    <li>
                                        <?=Helper::t('ourservices', 'SMM_STRATEGY_LIST_1')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'SMM_STRATEGY_LIST_2')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'SMM_STRATEGY_LIST_3')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'SMM_STRATEGY_LIST_4')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'SMM_STRATEGY_LIST_5')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'SMM_STRATEGY_LIST_6')?>
                                    </li>
                                </ul>
                            </div>
                            <div class="smm-advance-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-5/icon-1.png'; ?>" align="">
                            </div>
                        </div>
                        <div class="smm-advance-item">
                            <div class="smm-advance-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-5/icon-2.png'; ?>" align="">
                            </div>
                            <div class="smm-advance-content">
                                <div class="smm-advance-title">
                                    <?=Helper::t('ourservices', 'SMM_MANAGEMENT')?>
                                </div>
                                <ul>
                                    <li>
                                        <?=Helper::t('ourservices', 'SMM_MANAGEMENT_LIST_1')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'SMM_MANAGEMENT_LIST_2')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'SMM_MANAGEMENT_LIST_3')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'SMM_MANAGEMENT_LIST_4')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'SMM_MANAGEMENT_LIST_5')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'SMM_MANAGEMENT_LIST_6')?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="smm-advance-item">
                            <div class="smm-advance-content">
                                <div class="smm-advance-title">
                                    <?=Helper::t('ourservices', 'SMM_ADVERTISING')?>
                                </div>
                                <ul>
                                    <li>
                                        <?=Helper::t('ourservices', 'SMM_ADVERTISING_LIST_1')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'SMM_ADVERTISING_LIST_2')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'SMM_ADVERTISING_LIST_3')?>
                                    </li>
                                </ul>
                            </div>
                            <div class="smm-advance-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-5/icon-3.png'; ?>" align="">
                            </div>
                        </div>
                        <div class="smm-advance-item">
                            <div class="smm-advance-icon">
                                <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-5/icon-4.png'; ?>" align="">
                            </div>
                            <div class="smm-advance-content">
                                <div class="smm-advance-title">
                                    <?=Helper::t('ourservices', 'SMM_ASSESSMENT')?>
                                </div>
                                <ul>
                                    <li>
                                        <?=Helper::t('ourservices', 'SMM_ASSESSMENT_LIST_1')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'SMM_ASSESSMENT_LIST_2')?>
                                    </li>
                                    <li>
                                        <?=Helper::t('ourservices', 'SMM_ASSESSMENT_LIST_3')?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="smm-title st-second">
                        <?=Helper::t('ourservices', 'SMM_RESULT')?>
                    </div>
                    <div class="smm-result-block">
                        <div class="smr-content">
                            <div class="smr-cont-item">
                                <div class="smr-cont-num">
                                    1
                                </div>
                                <div class="smr-cont-desk">
                                    <?=Helper::t('ourservices', 'SMM_RESULT_LIST_1')?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="smr-cont-item">
                                <div class="smr-cont-num">
                                    2
                                </div>
                                <div class="smr-cont-desk">
                                    <?=Helper::t('ourservices', 'SMM_RESULT_LIST_2')?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="smr-cont-item">
                                <div class="smr-cont-num">
                                    3
                                </div>
                                <div class="smr-cont-desk">
                                    <?=Helper::t('ourservices', 'SMM_RESULT_LIST_3')?>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                        <div style="display: inline-block; vertical-align: middle;">
                            <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-5/icon-5.png'; ?>" align="">
                        </div>
                    </div>
                    <div class="smm-title st-second">
                        <?=Helper::t('ourservices', 'SMM_SUCCESS')?>
                    </div>
                    <div class="smm-luck-block">
                        <ul>
                            <li>
                                <?=Helper::t('ourservices', 'SMM_SUCCESS_LIST_1')?>
                            </li>
                            <li>
                                <?=Helper::t('ourservices', 'SMM_SUCCESS_LIST_2')?>
                            </li>
                            <li>
                                <?=Helper::t('ourservices', 'SMM_SUCCESS_LIST_3')?>
                            </li>
                            <li>
                                <?=Helper::t('ourservices', 'SMM_SUCCESS_LIST_4')?>
                            </li>
                            <li>
                                <?=Helper::t('ourservices', 'SMM_SUCCESS_LIST_5')?>
                            </li>
                        </ul>
                    </div>
                    <div class="wt-button-block">
                        <div class="wt-btn-ser transit-300"  data-service="promotion">
                            <?=Helper::t('ourservices', 'SERVICE_BUTTON')?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="s-item s-6 transit-1000">
            <a href="#item6" class="s-item-title" id="item6">
                <div class="sit-bg service-background_6 transit-500"></div>
                <div class="sit-inner inner-second transit-300"></div>
                <div class="sit-block">
                    <div class="sit-block-cell">
                        <div class="sit-cell-container transit-300">

                            <div class="sit-second-service-title sst-left">
                                <div class="st-title">
                                    <?=Helper::t('ourservices', 'DESIGN_TITLE')?>
                                </div>
                                <div class="st-description">
                                    <?=Helper::t('ourservices', 'DESIGN_CONTENT_1')?>
                                </div>
                                <div class="st-description">
                                    <?=Helper::t('ourservices', 'DESIGN_CONTENT_2')?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </a>
            <div class="s-item-description">
                <div class="sid-item-6">
                    <div class="firm-title">
                        <?=Helper::t('ourservices', 'DESIGN_CORPORATE_TITLE')?>
                    </div>
                    <div class="firm-desk first">
                        <ul>
                            <li>
                                <?=Helper::t('ourservices', 'DESIGN_CORPORATE_LIST_1')?>
                            </li>
                            <li>
                                <?=Helper::t('ourservices', 'DESIGN_CORPORATE_LIST_2')?>
                            </li>
                            <li>
                                <?=Helper::t('ourservices', 'DESIGN_CORPORATE_LIST_3')?>
                            </li>
                        </ul>
                        <div class="firm-icon-block">
                            <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-6/icon-1.png'; ?>" alt="">
                        </div>
                    </div>
                    <div class="firm-desk second">
                        <div class="firm-icon-block">
                            <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_service-6/icon-more.png'; ?>" alt="">
                        </div>
                        <ul>
                            <li>
                                <?=Helper::t('ourservices', 'DESIGN_CORPORATE_LIST_4')?>
                            </li>
                            <li>
                                <?=Helper::t('ourservices', 'DESIGN_CORPORATE_LIST_5')?>
                            </li>
                            <li>
                                <?=Helper::t('ourservices', 'DESIGN_CORPORATE_LIST_6')?>
                            </li>
                        </ul>
                    </div>
                    <div class="firm-why-title">
                        <?=Helper::t('ourservices', 'DESIGN_WHY_TITLE')?>
                    </div>
                    <div class="firm-why-content">
                        <ul>
                            <li>
                                <?=Helper::t('ourservices', 'DESIGN_WHY_LIST_1')?>
                            </li>
                            <li>
                                <?=Helper::t('ourservices', 'DESIGN_WHY_LIST_2')?>
                            </li>
                            <li>
                                <?=Helper::t('ourservices', 'DESIGN_WHY_LIST_3')?>
                            </li>
                            <li>
                                <?=Helper::t('ourservices', 'DESIGN_WHY_LIST_4')?>
                            </li>
                            <li>
                                <?=Helper::t('ourservices', 'DESIGN_WHY_LIST_5')?>
                            </li>
                        </ul>
                    </div>
                    <div class="wt-button-block">
                        <div class="wt-btn-ser transit-300" data-service="styles">
                            <?=Helper::t('ourservices', 'SERVICE_BUTTON')?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

<div class="popup-container transit-500">
    <div class="popup-subscribe">
        <div class="popup-subscribe-cell">
            <div class="popup-item-window">
                <div class="close-popup">
                    <div class="close-button">
                        <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_popup/close.png'; ?>" alt="" class="c-default transit-300">
                        <img src="<?=Yii::getAlias('@web').'/page/services/style/images/i_popup/close-hover.png'; ?>" alt="" class="c-active transit-300">
                    </div>
                </div>
                <div class="popup-content">
                    <? echo $this->render('_statement_form')?>
                </div>
                <!--<form action="#1" method="post">
                    <div class="ppd-form-title">
                        Заказать услугу
                    </div>
                    <div class="ppd-in-form">
                        <input type="text" placeholder="Ваше имя" class="in-put error" required="required">
                        <input type="phone" placeholder="Телефон" class="in-put" required="required">
                        <input type="email" placeholder="E-mail" class="in-put" required="required">
                    </div>
                    <div class="btn-container">
                        <button class="btn-order">Заказать услугу</button>
                    </div>
                </form>-->
            </div>
        </div>
    </div>
</div>