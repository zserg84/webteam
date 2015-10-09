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

class Helper {

    public static function fillFirstPageMenu(){
        $menu = [
            [
                'title' => 'Услуги',
                'url' => '#services',
                'id' => 'ni-services',
            ],
            [
                'title' => 'Портфолио',
                'url' => '#portfolio',
                'id' => 'ni-portfolio',
            ],
            [
                'title' => 'Команда',
                'url' => '#team',
                'id' => 'ni-team',
            ],
            [
                'title' => 'Отзывы',
                'url' => '#comment',
                'id' => 'ni-comment',
            ],
            [
                'title' => 'Контакты',
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
        $menu = [
            [
                'title' => 'Услуги',
                'url' => Url::toRoute(['/service/index']),
                'id' => 'ni-services',
                'active' => $route == 'service/index',
            ],
            [
                'title' => 'Портфолио',
                'url' => Url::toRoute(['/portfolio/index']),
                'id' => 'ni-portfolio',
                'active' => in_array($route, ['portfolio/index', 'portfolio/view']),
            ],
            [
                'title' => 'Команда',
                'url' => Url::toRoute(['/team/index']),
                'id' => 'ni-team',
                'active' => $route == 'team/index',
            ],
            [
                'title' => 'Вакансии',
                'url' => Url::toRoute(['/vacancy/index']),
                'id' => 'ni-vacancy',
                'active' => $route == 'vacancy/index',
            ],
            [
                'title' => 'Контакты',
                'url' => Url::toRoute(['/site/contact']),
                'id' => 'ni-contacts',
                'active' => $route == 'site/contact',
            ],
        ];
        return [
            'menu' => $menu,
            'class' => 'top-bar top-bar-move',
        ];
    }
} 