<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 10.09.15
 * Time: 14:30
 */

namespace backend\controllers;


use backend\models\form\TeamForm;
use backend\models\search\TeamSearch;
use common\actions\BatchDeleteAction;
use common\actions\CreateAction;
use common\actions\DeleteAction;
use common\actions\IndexAction;
use common\actions\UpdateAction;
use common\models\Image;
use common\models\Lang;
use common\models\Team;
use common\models\TeamLang;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\UploadedFile;

class TeamController extends Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'modelClass' => TeamSearch::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Team::className(),
                'formModelClass' => TeamForm::className(),
                'ajaxValidation' => true,
                'redirectUrl' => Url::toRoute('index'),
                'afterAction' => function($action, $model, $formModel) {
                    return $this->afterEdit($action, $model, $formModel);
                }
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Team::className(),
                'formModelClass' => TeamForm::className(),
                'redirectUrl' => Url::toRoute('index'),
                'ajaxValidation' => true,
                'beforeAction' => function($model, $formModel){
                    $formModel->black_image = $model->blackImage;
                    $formModel->color_image = $model->colorImage;

                    $languages = Lang::find()->all();
                    $itemLangs = $model->teamLangs;
                    $itemLangs = ArrayHelper::index($itemLangs, 'lang_id');
                    foreach($languages as $language){
                        $itemLang = isset($itemLangs[$language->id]) ? $itemLangs[$language->id] : new TeamLang();
                        $formModel->translationSurname[$language->id] = $itemLang->surname;
                        $formModel->translationName[$language->id] = $itemLang->name;
                        $formModel->translationPosition[$language->id] = $itemLang->position;
                        $formModel->translationDescription[$language->id] = $itemLang->description;
                    }
                    return $formModel;
                },
                'afterAction' => function($action, $model, $formModel){
                    return $this->afterEdit($action, $model, $formModel);
                }
            ],
            'delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Team::className(),
                'redirectUrl' => Url::toRoute(['index']),
            ],
            'batch-delete' => [
                'class' => BatchDeleteAction::className(),
                'modelClass' => Team::className(),
            ],
            'image-delete' => [
                'class' => DeleteAction::className(),
                'modelClass' => Image::className(),
                'modelIdName' => 'key',
                'redirectUrl' => false,
            ],
        ];
    }

    public function afterEdit($action, $model, $formModel)
    {
        $formModel->black_image = UploadedFile::getInstance($formModel, 'black_image');
        $formModel->color_image = UploadedFile::getInstance($formModel, 'color_image');
        if ($black_image = $formModel->getImageModel('black_image')) {
            $model->black_image_id = $black_image->id;
            $model->save();
        }
        if ($color_image = $formModel->getImageModel('color_image')) {
            $model->color_image_id = $color_image->id;
            $model->save();
        }

        $model->saveLangsRelations('teamLangs', $formModel, 'translationSurname', 'surname', 'team_id');
        $model->saveLangsRelations('teamLangs', $formModel, 'translationName', 'name', 'team_id');
        $model->saveLangsRelations('teamLangs', $formModel, 'translationPosition', 'position', 'team_id');
        $model->saveLangsRelations('teamLangs', $formModel, 'translationDescription', 'description', 'team_id');

        return $model;
    }

    public function actionChangeOrder($id, $order){
        $model = Team::findOne($id);
        $secondModel = null;
        if($order == -1){
            $secondModel = Team::find()->where([
                '<', 'team.orderby', $model->orderby
            ])->orderBy('orderby desc')->one();
        }
        elseif($order == 1){
            $secondModel = Team::find()->where([
                '>', 'team.orderby', $model->orderby
            ])->orderBy('orderby asc')->one();
        }
        $secondModel = $secondModel ? $secondModel : Team::find()->where(['orderby'=>null])->one();
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