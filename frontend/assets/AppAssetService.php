<?php

namespace frontend\assets;

use yii\web\AssetBundle;


class AppAssetService extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'page/services/import-style.css',
    ];
    public $js = [
        'scripts/bootstrap/bootstrap.js',
        'scripts/media/wt-mobile-menu.js',
        'page/services/scripts/configuration.js'
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_END];
}
