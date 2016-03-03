<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\components\Helper;
use frontend\modules\calculator\widgets\calculator\CalculatorWidget;
use common\models\Lang;
use yii\helpers\Url;
use common\models\Image;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="shortcut icon" href="<?=Yii::getAlias('@web').'/style/images'; ?>/favicon.ico" type="image/x-icon" />

    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="/frontend/web/style/css/media/m_media-screen.css">
    <![endif]-->

    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="/frontend/web/style/css/all-media_top-bar.css">
    <![endif]-->

    <!-- [IE] -->
    <link rel="stylesheet" type="text/css" href="/frontend/web/style/css/m_ie.css">
    <!--/[IE]/-->
    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="/frontend/web/style/css/m_ie8.css">
    <![endif]-->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="<?=Yii::getAlias('@web') . '/scripts/yandex_analitics.js'; ?>"></script>
    <script src="<?=Yii::getAlias('@web') . '/scripts/google_analitics.js'; ?>"></script>
    <?php $this->head() ?>
</head>
<body class="lng-page-<?= Yii::$app->language ?>">
<?php $this->beginBody() ?>

<div class="loader-img">
    <img src="<?=Yii::getAlias('@web').'/style/images/i-loader.png'; ?>" alt="">
</div>

<div class="background-inner-content"></div>
<div class="wt-mobile-menu transit-1000"></div>
<?
if(isset(Yii::$app->controller->topMenu)){
    $topMenu = Yii::$app->controller->topMenu;
}
else{
    $topMenu = Helper::fillFirstPageMenu();
}
?>
<?
$curLang = Lang::getCurrent();
$curLangImage = $curLang->image ? $curLang->image : new Image;
?>
<div class="wt-mobile-content transit-1000">
    <?foreach($topMenu['menu'] as $menu):?>
        <a href="<?=$menu['url']?>" class="wt-link-menu transit-300">
            <div class="wt-menu-name">
                <?=$menu['title']?>
            </div>
            <div class="wt-link-separator">
                <div class="separator-line"></div>
            </div>
        </a>
    <?endforeach?>
    <div class="wt-lang-mobile">
        <div class="wt-lang-title transit-300">
            <div class="wt-lang-name">
                <?=$curLang->name?>
            </div>
            <div class="wt-lang-country">
                <img src="<?=$curLangImage->getSrc(); ?>" alt="">
            </div>
            <div class="wt-lang-arrow">
                <img src="<?=Yii::getAlias('@web').'/style/images/i_mobile-menu/icon-arrow-lang.png'; ?>" alt="" class="iwt-lang-arrow transit-300">
            </div>
        </div>
        <div class="wt-lang-list">
            <?foreach(Lang::find()->all() as $lang):
                if($lang->id == $curLang->id)
                    continue;
                $imageLang = $lang->image ? $lang->image : new Image();
                ?>
                <a href="<?=Url::to('/'.$lang->url.Yii::$app->getRequest()->getLangUrl())?>" class="wt-lang-item transit-300">
                    <div class="lang-item-name">
                        <?=$lang->name?>
                    </div>
                    <div class="lang-item-country">
                        <img src="<?=$imageLang->getSrc() ?>" alt="">
                    </div>
                </a>
                <div class="lang-item-separator">
                    <div class="li-separator"></div>
                </div>
            <?endforeach?>
            <div class="wt-ls-bottom-separator"></div>
        </div>
    </div>
</div>

<header>
    <div class="<?=$topMenu['class']?>">
        <div class="tb-container">
            <a href="<?=Url::toRoute(['/site/index'])?>" class="logo-container transit-300">
                <div class="lc-cell">
                    <div class="logo-picture">
                        <img src="<?=Yii::getAlias('@web').'/style/images/logo.png'; ?>" alt="" class="transit-300">
                    </div>
                    <div class="logo-name">
                        <img src="<?=Yii::getAlias('@web').'/style/images/logo-text.png'; ?>" alt="" class="transit-300">
                    </div>
                </div>
            </a>
            <div class="menu-cell">
                <nav>
                    <?foreach($topMenu['menu'] as $menu):
                        $active = isset($menu['active']) && $menu['active'] ? 'nav-active' : '';
                        ?>
                        <div class="nav-item <?=$active?>" id="<?=$menu['id']?>">
                            <div class="nav-i-cell transit-300">
                                <a href="<?=$menu['url']?>" class="nav-link transit-300">
                                    <?=$menu['title']?>
                                </a>
                            </div>
                        </div>
                    <?endforeach?>
                </nav>
                <div class="nav-item-underline transit-300"></div>
            </div>
            <div class="top-bar-right transit-300">
                <div class="tbr-cell">
                    <div class="tbr-call-mail">
                        <a href="tel:88002009188" class="tbr-link-call">
                            <?=Helper::t('main', 'PHONE_NUMBER')?>
                        </a>
                    </div>

                    <div class="tb-language-container">
                        <div class="tb-lang-block">
                            <div class="tb-flag-country">
                                <img src="<?=$curLangImage->getSrc(); ?>" alt="">
                            </div>
                            <div class="tb-lang-arrow">
                                <img src="<?=Yii::getAlias('@web').'/style/images/i_lang/arrow-lang.png'; ?>" alt="">
                            </div>
                        </div>
                        <div class="tb-lang-list transit-300">
                            <?foreach(Lang::find()->all() as $lang):
                                if($lang->id == $curLang->id)
                                    continue;
                                $imageLang = $lang->image ? $lang->image : new Image();
                                ?>
                                <a href="<?=Url::to('/'.$lang->url.Yii::$app->getRequest()->getLangUrl())?>">
                                    <div class="tb-lang-list-country">
                                        <img src="<?=$imageLang->getSrc() ?>" alt="">
                                    </div>
                                    <div class="tb-lang-list-name">
                                        <?=$lang->name?>
                                    </div>
                                </a>
                            <?endforeach?>
                        </div>
                    </div>
                    <?
                    $lang = Lang::getCurrent();
                    if($lang->url == 'ru'){
                        $type = Yii::$app->getRequest()->get('calculator_type', CalculatorWidget::TYPE_START);
                        echo CalculatorWidget::widget([
                            'type' => $type
                        ]);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</header>

<div>
    <section>
        <?= $content ?>
    </section>
</div>

<?if(\Yii::$app->session->getFlash('message')):?>
<div class="send-message-container sm-show transit-1000">
    <div class="sm-block">
        <div class="sm-block-cell">
            <div class="sm-window">
                <div class="sm-window-context">
                    <?=\Yii::$app->session->getFlash('message')?>
                </div>
                <div class="sm-window-btn transit-300">
                    Ok
                </div>
            </div>
        </div>
    </div>
</div>
<?endif?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
