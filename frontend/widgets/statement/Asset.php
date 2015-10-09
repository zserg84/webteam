<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 05.10.15
 * Time: 12:58
 */

namespace frontend\widgets\statement;


use yii\web\AssetBundle;

class Asset extends AssetBundle
{

    public $sourcePath = '@frontend/widgets/statement/assets';

    public $js = [
        'js/selectFx.js',
        'js/statement.js',
    ];

    public $css = [
        'css/select-fx/cs-select.css.css',
        'css/select-fx/cs-select-elastic.css',
        'css/statement.css',
    ];
} 