<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 02.02.16
 * Time: 12:14
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class Asset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $js = [
        'scripts/configuration.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
} 