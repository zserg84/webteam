<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\components\Helper;

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

    <? echo $this->render('yandex_analitics')?>
    <? echo $this->render('google_analitics')?>

    <?php $this->head() ?>
</head>
<body>
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
                Русский
            </div>
            <div class="wt-lang-country">
                <img src="<?=Yii::getAlias('@web').'/style/images/i_mobile-menu/icon-rus.png'; ?>" alt="">
            </div>
            <div class="wt-lang-arrow">
                <img src="<?=Yii::getAlias('@web').'/style/images/i_mobile-menu/icon-arrow-lang.png'; ?>" alt="" class="iwt-lang-arrow transit-300">
            </div>
        </div>
        <div class="wt-lang-list">
            <a href="#1" class="wt-lang-item transit-300">
                <div class="lang-item-name">
                    English
                </div>
                <div class="lang-item-country">
                    <img src="<?=Yii::getAlias('@web').'/style/images/i_mobile-menu/icon-eng.png'; ?>" alt="">
                </div>
            </a>
            <div class="lang-item-separator">
                <div class="li-separator"></div>
            </div>
            <a href="#1" class="wt-lang-item transit-300">
                <div class="lang-item-name">
                    Русский
                </div>
                <div class="lang-item-country">
                    <img src="<?=Yii::getAlias('@web').'/style/images/i_mobile-menu/icon-rus.png'; ?>" alt="">
                </div>
            </a>
            <div class="wt-ls-bottom-separator"></div>
        </div>
    </div>
</div>

<header>
    <div class="<?=$topMenu['class']?>">
        <div class="tb-container">
            <a href="<?=\yii\helpers\Url::toRoute(['/site/index'])?>" class="logo-container transit-300">
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
                            8 (800) 200-91-88
                        </a>
                    </div>
                    <div class="tb-language-container">
                        <div class="tb-lang-block">
                            <div class="tb-flag-country">
                                <img src="<?=Yii::getAlias('@web').'/style/images/i_lang/f-rus.png'; ?>" alt="">
                            </div>
<!--                            <div class="tb-lang-arrow">-->
<!--                                <img src="--><?//=Yii::getAlias('@web').'/style/images/i_lang/arrow-lang.png'; ?><!--" alt="">-->
<!--                            </div>-->
                        </div>
<!--                        <div class="tb-lang-list transit-300">-->
<!--                            <a href="#eng">-->
<!--                                <div class="tb-lang-list-country">-->
<!--                                    <img src="--><?//=Yii::getAlias('@web').'/style/images/i_lang/f-eng.png'; ?><!--" alt="">-->
<!--                                </div>-->
<!--                                <div class="tb-lang-list-name">-->
<!--                                    Eng-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </div>-->
                    </div>
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
