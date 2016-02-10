<?php

namespace frontend\assets;

use yii\web\AssetBundle;


class AppAssetMain extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'style/import-style.css',
        'style/css/management.css',
    ];
    public $js = [
        'scripts/bootstrap/bootstrap.js',
        'scripts/media/classie.js',
        'scripts/jquery.placeholder.js',
        'scripts/placeholder-ie.js',
        'scripts/media/selectFx.js',
        'scripts/media/carousel-options.js',
        'scripts/media/wt-mobile-menu.js',
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_END];
}
