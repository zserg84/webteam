<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 08.09.15
 * Time: 12:50
 */

namespace frontend\controllers;


use common\models\Portfolio;
use frontend\components\Helper;
use yii\base\Exception;
use yii\web\NotFoundHttpException;

class PortfolioController extends Controller
{

    public function init(){
        parent::init();

        $this->getView()->title = Helper::t('portfolio', 'PAGE_TITLE');
        $this->getView()->registerMetaTag([
            'name' => 'keywords',
            'content' => Helper::t('portfolio', 'PAGE_KEYWORDS')
        ]);
        $this->getView()->registerMetaTag([
            'name' => 'description',
            'content' => Helper::t('portfolio', 'PAGE_DESCRIPTION')
        ]);
    }

    public function actionIndex(){
        $portfolios = Portfolio::find()->orderBy('orderby')->all();
        return $this->render('index', [
            'portfolios' => $portfolios,
        ]);
    }

    public function actionView($id){
        $model = Portfolio::find()->where(['alias'=>$id])->one();
        if(!$model){
            $model = $this->findModel($id);
        }

        return $this->render('view', [
            'model' => $model
        ]);
    }

    public function findModel($id){
        return $this->_findModel(Portfolio::className(), $id);
    }
} 