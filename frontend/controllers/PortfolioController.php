<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 08.09.15
 * Time: 12:50
 */

namespace frontend\controllers;


use common\models\Portfolio;
use yii\base\Exception;
use yii\web\NotFoundHttpException;

class PortfolioController extends Controller
{

    public function init(){
        parent::init();

        $this->getView()->title = 'Наше портфолио';
        $this->getView()->registerMetaTag([
            'name' => 'keywords',
            'content' => 'создание сайтов портфолио, крутые сайты портфолио, лучшие сайты портфолио,
дизайн сайта портфолио, разработка сайтов портфолио, примеры сайтов портфолио, красивые сайты портфолио,
создание сайтов портфолио москва, портфолио сайтов веб студия, портфолио веб студии'
        ]);
        $this->getView()->registerMetaTag([
            'name' => 'description',
            'content' => 'В нашем портфолио более 100 успешно реализованных проектов:
от информационных порталов для посетителей до мобильных приложений.
В портфолио представлены последние проекты для крупных клиентов.
'
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