<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 09.09.15
 * Time: 12:58
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class AppAssetVacancy extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'page/vacancy/import-style.css',
    ];
    public $js = [
        'scripts/bootstrap/bootstrap.js',
        'scripts/media/wt-mobile-menu.js',
        'page/vacancy/scripts/configuration.js'
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_END];
}