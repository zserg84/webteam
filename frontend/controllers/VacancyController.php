<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 09.09.15
 * Time: 12:43
 */

namespace frontend\controllers;


use common\models\StatementInterest;
use common\models\StatementLetter;
use common\models\Vacancy;
use yii\helpers\VarDumper;
use yii\web\Response;
use yii\widgets\ActiveForm;

class VacancyController extends Controller
{
    public function init(){
        parent::init();

        $this->getView()->title = 'IT вакансии';
        $this->getView()->registerMetaTag([
            'name' => 'keywords',
            'content' => 'создание сайтов вакансии, руководитель интернет проекта вакансии, руководитель ит проектов вакансии,
ит специалист вакансии, вакансии ит руководитель, проектировщик интерфейсов вакансия,
php программист вакансии, вакансия front end разработчика, html верстальщик вакансии,
ios разработчик вакансии, тестировщик сайтов вакансии, веб студия вакансии'
        ]);
        $this->getView()->registerMetaTag([
            'name' => 'description',
            'content' => 'Работать в нашей команде одно удовольствие! На постоянную работу требуется:
руководитель проектов, аналитик, проектировщик интерфейсов, PHP программист,
front-end разработчик, HTML верстальщик, Android разработчик для
мобильных приложений, тестировщик сайтов и приложений
'
        ]);
    }

    public function actionIndex(){
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
                    'Ваше сообщение отправлено'
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