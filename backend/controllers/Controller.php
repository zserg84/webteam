<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 08.09.15
 * Time: 13:43
 */

namespace backend\controllers;


use yii\filters\AccessControl;

class Controller extends \yii\web\Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['accessBackend']
                    ]
                ]
            ]
        ];
    }
} 