<div style="font-size: 12px">

<?php

/**
 * Sidebar menu layout.
 *
 * @var \yii\web\View $this View
 */

use kartik\sidenav\SideNav;

echo SideNav::widget([
    'type' => SideNav::TYPE_DEFAULT,
    'encodeLabels' => false,
    'activateParents' => true,
    'items' => [
        [
            'label' => 'Главная',
            'url' => Yii::$app->homeUrl,
            'icon' => 'fa-dashboard',
            'active' => Yii::$app->request->url === Yii::$app->homeUrl
        ],
        [
            'label' => 'Языки',
            'url' => ['/lang/index'],
        ],
        [
            'label' => 'Заявки',
            'url' => ['/statement/index'],
        ],
        [
            'label' => 'Отзывы',
            'url' => ['/recall/index'],
        ],
        [
            'label' => 'Портфолио',
            'url' => ['/portfolio/index'],
        ],
        [
            'label' => 'Вакансии',
            'url' => ['/vacancy/index'],
        ],
        [
            'label' => 'Команда',
            'url' => ['/team/index'],
        ],
        [
            'label' => 'Калькулятор',
            'url' => ['/team/index'],
            'active' => Yii::$app->controller->module->id == 'calculator',
            'items' => [
                [
                    'label' => 'Специалисты',
                    'url' => ['/calculator/specialist/index'],
                    'active'=>\Yii::$app->controller->id == 'specialist',
                ],
                [
                    'label' => 'Расчет фирменного стиля',
                    'url' => ['/calculator/calculation-firstyle/index'],
                    'active'=>\Yii::$app->controller->id == 'calculation-firstyle',
                ],
                [
                    'label' => 'Расчет дизайна',
                    'url' => ['/calculator/calculation-design/index'],
                    'active'=>\Yii::$app->controller->id == 'calculation-design',
                ],
                [
                    'label' => 'Расчет корпоративного сайта',
                    'url' => ['/calculator/calculation-site/index'],
                    'active'=>\Yii::$app->controller->id == 'calculation-site',
                ],
                [
                    'label' => 'Модуль задания цен',
                    'url' => ['/calculator/calculation-common/index'],
                    'active'=>\Yii::$app->controller->id == 'calculation-common',
                ],
            ],
        ],
    ],
]);

?>

</div>