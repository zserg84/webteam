<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 05.10.15
 * Time: 13:46
 */

namespace frontend\widgets\statement;


use yii\web\AssetBundle;

class MainAsset  extends Asset
{

    public $sourcePath = '@frontend/widgets/statement/assets';

    public $js = [
        'js/selectFx.js',
        'js/main-statement.js',
    ];
} 