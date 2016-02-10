<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 09.09.15
 * Time: 12:43
 */

namespace frontend\controllers;


use common\models\Lang;
use common\models\StatementInterest;
use common\models\StatementLetter;
use common\models\Vacancy;
use frontend\components\Helper;
use yii\helpers\VarDumper;
use yii\web\Response;
use yii\widgets\ActiveForm;

class VacancyController extends Controller
{
    public function init(){
        parent::init();

        $this->getView()->title = Helper::t('vacancy', 'PAGE_TITLE');
        $this->getView()->registerMetaTag([
            'name' => 'keywords',
            'content' => Helper::t('vacancy', 'PAGE_KEYWORDS')
        ]);
        $this->getView()->registerMetaTag([
            'name' => 'description',
            'content' => Helper::t('vacancy', 'PAGE_DESCRIPTION')
        ]);
    }

    public function actionIndex(){
        $lang = Lang::getCurrent();
        if($lang->url != 'ru')
            return $this->redirect('/team/index');

        $vacancies = Vacancy::find()->all();
        return $this->render('index', [
            'vacancies' => $vacancies,
        ]);
    }

    public function actionView($id){
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function findModel($id){
        return $this->_findModel(Vacancy::className(), $id);
    }

    public function actionStatement(){
        $vacancy = \Yii::$app->getRequest()->post('hiddenVacancy');
        $model = new StatementLetter();
        $post = \Yii::$app->getRequest()->post();
        $interest = StatementInterest::findOne(2);
        $model->interest_id = $interest->id;
        if($model->load($post)){
            $model->from = StatementLetter::getFromValue(StatementLetter::FROM_VACANCY) . '('.$vacancy.')';
            $model->page = \Yii::$app->request->referrer . '&hiddenVacancy='.$vacancy;

            if (\Yii::$app->request->isAjax) {
                \Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

            if($model->save()){
                \Yii::$app->session->setFlash(
                    'message',
                    Helper::t('main', 'SEND_OK_MESSAGE')
                );
                return $this->redirect(\Yii::$app->request->referrer);
            }

        }
        else{
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }
} 