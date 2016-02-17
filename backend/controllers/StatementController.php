<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 11.09.15
 * Time: 16:48
 */

namespace backend\controllers;


use backend\models\search\StatementLetterSearch;
use common\actions\DeleteAction;
use common\actions\IndexAction;
use backend\models\StatementLetter;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;

class StatementController extends Controller
{
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'modelClass' => StatementLetterSearch::className(),
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => StatementLetter::className(),
                'redirectUrl' => Url::toRoute(['index']),
            ],
        ];
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function findModel($id)
    {
        if (($model = StatementLetter::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

} 