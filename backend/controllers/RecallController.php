<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 08.09.15
 * Time: 13:42
 */

namespace backend\controllers;


use backend\models\Recall;
use backend\models\RecallLang;
use backend\models\search\RecallSearch;
use common\actions\BatchDeleteAction;
use common\actions\CreateAction;
use common\actions\DeleteAction;
use common\actions\IndexAction;
use backend\models\form\RecallForm;
use common\actions\UpdateAction;
use common\models\Image;
use common\models\Lang;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

class RecallController extends Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'modelClass' => RecallSearch::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Recall::className(),
                'formModelClass' => RecallForm::className(),
                'ajaxValidation' => true,
                'redirectUrl' => Url::toRoute('index'),
                'beforeValidate' => function($model, $formModel){
                    $formModel->image_cover = UploadedFile::getInstance($formModel, 'image_cover');
                    return $formModel;
                },
                'afterAction' => function($action, $model, $formModel) {
                    return $this->afterEdit($action, $model, $formModel);
                }
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Recall::className(),
                'formModelClass' => RecallForm::className(),
                'redirectUrl' => Url::toRoute('index'),
                'ajaxValidation' => true,
                'beforeAction' => function($model, $formModel){
                    $formModel->image_cover = $model->image;

                    $languages = Lang::find()->all();
                    $itemLangs = $model->recallLangs;
                    $itemLangs = ArrayHelper::index($itemLangs, 'lang_id');
                    foreach($languages as $language){
                        $itemLang = isset($itemLangs[$language->id]) ? $itemLangs[$language->id] : new RecallLang();
                        $formModel->translationText[$language->id] = $itemLang->text;
                        $formModel->translationMember[$language->id] = $itemLang->member;
                        $formModel->translationCompany[$language->id] = $itemLang->company;
                    }
                    return $formModel;
                },
                'beforeValidate' => function($model, $formModel){
                    $formModel->image_cover = UploadedFile::getInstance($formModel, 'image_cover');
                    return $formModel;
                },
                'afterAction' => function($action, $model, $formModel){
                    return $this->afterEdit($action, $model, $formModel);
                }
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Recall::className(),
                'redirectUrl' => Url::toRoute(['index']),
            ],
            'batch-delete' => [
                'class' => BatchDeleteAction::className(),
                'modelClass' => Recall::className(),
            ],
            /*'image-delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Image::className(),
                'modelIdName' => 'key',
                'redirectUrl' => false,
            ],*/
        ];
    }

    public function afterEdit($action, $model, $formModel)
    {
        if($formModel->image_cover){
            if ($image = $formModel->getImageModel('image_cover')) {
                $formModel->image_cover = $image;
                $model->image_id = $formModel->image_cover->id;
                $model->save();
            }
        }

        $model->saveLangsRelations('recallLangs', $formModel, 'translationText', 'text', 'recall_id');
        $model->saveLangsRelations('recallLangs', $formModel, 'translationMember', 'member', 'recall_id');
        $model->saveLangsRelations('recallLangs', $formModel, 'translationCompany', 'company', 'recall_id');

        return $model;
    }

    public function actionChangeOrder($id, $order){
        $model = Recall::findOne($id);
        $secondModel = null;
        if($order == -1){
            $secondModel = Recall::find()->where([
                '<', 'recall.orderby', $model->orderby
            ])->orderBy('orderby desc')->one();
        }
        elseif($order == 1){
            $secondModel = Recall::find()->where([
                '>', 'recall.orderby', $model->orderby
            ])->orderBy('orderby asc')->one();
        }
        $secondModel = $secondModel ? $secondModel : Recall::find()->where(['orderby'=>null])->one();
        if($secondModel){
            $modelOrderby = $model->orderby;
            $model->orderby = $secondModel->orderby;
            $model->save();
            $secondModel->orderby = $modelOrderby;
            $secondModel->save();
        }
        $this->redirect(Url::toRoute(['index']));
    }
} 