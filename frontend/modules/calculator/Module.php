<?php

namespace frontend\modules\calculator;

use yii\i18n\PhpMessageSource;

class Module extends \yii\base\Module
{

    public static function initLang(){
        $app = \Yii::$app;
        $translates = [
            'main',
            'design',
            'portal',
            'contact',
            'calculation',
        ];
        foreach($translates as $translate){
            if (!isset($app->i18n->translations[$translate])) {
                $app->i18n->translations[$translate] = [
                    'class' => PhpMessageSource::className(),
                    'forceTranslation' => true,
                    'basePath' => '@app/modules/calculator/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        $translate => $translate.'.php',
                    ],
                ];
            }
        }

    }

    public static function t($category, $message, $params = [], $language = null)
    {
        self::initLang();
        return \Yii::t($category, $message, $params, $language);
    }
}