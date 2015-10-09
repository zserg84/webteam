<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 10.09.15
 * Time: 15:46
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class AppAssetTeam extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'page/team/import-style.css',
    ];
    public $js = [
        'scripts/bootstrap/bootstrap.js',
        'scripts/media/wt-mobile-menu.js',
        'page/team/scripts/configuration.js'
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_END];
}