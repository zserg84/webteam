<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 09.11.15
 * Time: 12:16
 */

namespace frontend\modules\calculator\widgets\calculator;


use yii\web\AssetBundle;

class Asset extends AssetBundle
{

    /**
     * @inheritdoc
     */
    public $sourcePath = '@frontend/modules/calculator/widgets/calculator/assets';

    /**
     * @inheritdoc
     */
    public $css = [
        'css/calculator-style.css',
        'css/jquery.jscrollpane.css',
    ];

    public $js = [
        'js/wt-calculator.js',
        'js/jquery.jscrollpane.min.js',
        'js/jquery.mousewheel.js',
        'js/jquery.tinyscrollbar.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];

    public static function imgSrc($imageName ){
        $obj = new self();
        \Yii::$app->assetManager->publish($obj->sourcePath. "/images" );
        $dirPath = \Yii::$app->assetManager->getPublishedUrl($obj->sourcePath . "/images");
        $imagePath = $dirPath. "/" . $imageName;

        return $imagePath;
    }
} 