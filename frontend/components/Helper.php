<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 09.09.15
 * Time: 13:18
 */

namespace frontend\components;

use yii\helpers\Url;
use yii\helpers\VarDumper;
use common\models\Lang;

class Helper {

    public static function fillFirstPageMenu(){
        $menu = [
            [
                'title' => Helper::t('menu', 'SERVICES'),
                'url' => '#services',
                'id' => 'ni-services',
            ],
            [
                'title' => Helper::t('menu', 'PORTFOLIO'),
                'url' => '#portfolio',
                'id' => 'ni-portfolio',
            ],
            [
                'title' => Helper::t('menu', 'TEAM'),
                'url' => '#team',
                'id' => 'ni-team',
            ],
            [
                'title' => Helper::t('menu', 'REFERENCES'),
                'url' => '#comment',
                'id' => 'ni-comment',
            ],
            [
                'title' => Helper::t('menu', 'CONTACTS'),
                'url' => '#contacts',
                'id' => 'ni-contacts',
            ],
        ];
        return [
            'menu' => $menu,
            'class' => 'top-bar',
        ];
    }

    public static function fillDefaultMenu(){
        $route = \Yii::$app->requestedRoute;
        $lang = Lang::getCurrent();

        $menu = [
            [
                'title' => Helper::t('menu', 'SERVICES'),
                'url' => Url::toRoute(['/service/index']),
                'id' => 'ni-services',
                'active' => $route == 'service/index',
            ],
            [
                'title' => Helper::t('menu', 'PORTFOLIO'),
                'url' => Url::toRoute(['/portfolio/index']),
                'id' => 'ni-portfolio',
                'active' => in_array($route, ['portfolio/index', 'portfolio/view']),
            ],
            [
                'title' => Helper::t('menu', 'TEAM'),
                'url' => Url::toRoute(['/team/index']),
                'id' => 'ni-team',
                'active' => $route == 'team/index',
            ],
        ];

        if($lang->url == 'ru'){
            $menu[] = [
                'title' => Helper::t('menu', 'VACANCIES'),
                'url' => Url::toRoute(['/vacancy/index']),
                'id' => 'ni-vacancy',
                'active' => $route == 'vacancy/index',
            ];
        }

        $menu[] = [
            'title' => Helper::t('menu', 'CONTACTS'),
            'url' => Url::toRoute(['/site/contact']),
            'id' => 'ni-contacts',
            'active' => $route == 'site/contact',
        ];
        return [
            'menu' => $menu,
            'class' => 'top-bar top-bar-move',
        ];
    }

    public function t($category, $message, $params = [], $language = null){
        $language = $language ?: Lang::getCurrent()->url;
        $language = $language ?: static::$app->language;
        return \Yii::t($category, $message, $params, $language);
    }
} 