<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 09.09.15
 * Time: 11:50
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class AppAssetPortfolioView extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'page/portfolio/view/import-style.css',
    ];
    public $js = [
        'scripts/bootstrap/bootstrap.js',
        '/scripts/media/wt-mobile-menu.js',
        'page/portfolio/view/scripts/configuration.js',
        'page/portfolio/scripts/media/classie.js',
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_END];
}
