<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'Webteam-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'homeUrl' => '/',
    'language' => 'ru-RU',
    'modules' => [
        'calculator' => 'frontend\modules\calculator\Module',
    ],
    'components' => [
        'request' => [
            'class' => 'frontend\components\LangRequest',
            'cookieValidationKey' => 'sdi8s#fnj98jwiqiw;qfh!fjgh0d8f',
            'baseUrl' => ''
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager'=>[
//            'suffix' => '/',
            'rules'=>[
                '' => 'site/index',
                '/services' => 'service/index',
                '/portfolio' => 'portfolio/index',
                '/team' => 'team/index',
                '/vacancy' => 'vacancy/index',
                '/contacts' => 'site/contact',
                '/portfolio/view/<id:\w+>'=>'portfolio/view',
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ],
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en',
                    'forceTranslation' => true,
                    'fileMap' => [
                        'html' => 'html.php',
                    ],
                ],
            ],
        ],
    ],
    'params' => $params,
];
