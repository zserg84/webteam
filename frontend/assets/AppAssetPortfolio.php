<?php

namespace frontend\assets;

use yii\web\AssetBundle;


class AppAssetPortfolio extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'page/portfolio/import-style.css',
        'page/portfolio/style/css/management.css',
    ];
    public $js = [
        'scripts/bootstrap/bootstrap.js',
        'page/portfolio/scripts/media/classie.js',
        'page/portfolio/scripts/jquery.placeholder.js',
        'page/portfolio/scripts/media/placeholder-ie.js',
        '/scripts/media/wt-mobile-menu.js',
        'page/portfolio/scripts/configuration.js',
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_END];
}
