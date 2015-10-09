<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 09.09.15
 * Time: 12:24
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class AppAssetContact extends  AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'page/contact/import-style.css',
    ];
    public $js = [
        'scripts/bootstrap/bootstrap.js',
        'scripts/media/wt-mobile-menu.js',
        'page/contact/scripts/configuration.js'
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_END];
} 