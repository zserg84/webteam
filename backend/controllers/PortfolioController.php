<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 08.09.15
 * Time: 16:11
 */

namespace backend\controllers;

use backend\models\Portfolio;
use backend\models\PortfolioLang;
use backend\models\search\PortfolioSearch;
use common\actions\BatchDeleteAction;
use common\actions\CreateAction;
use common\actions\DeleteAction;
use common\actions\IndexAction;
use backend\models\form\PortfolioForm;
use common\actions\UpdateAction;
use common\models\Image;
use common\models\Lang;
use common\models\PortfolioImage;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\VarDumper;
use yii\web\UploadedFile;

class PortfolioController extends Controller
{

    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::className(),
                'modelClass' => PortfolioSearch::className(),
            ],
            'create' => [
                'class' => CreateAction::className(),
                'modelClass' => Portfolio::className(),
                'formModelClass' => PortfolioForm::className(),
                'ajaxValidation' => true,
                'redirectUrl' => Url::toRoute('index'),
                'afterAction' => function($action, $model, $formModel) {
                    return $this->afterEdit($action, $model, $formModel);
                }
            ],
            'update' => [
                'class' => UpdateAction::className(),
                'modelClass' => Portfolio::className(),
                'formModelClass' => PortfolioForm::className(),
                'redirectUrl' => Url::toRoute('index'),
                'ajaxValidation' => true,
                'beforeAction' => function($model, $formModel){
                    $formModel->images = $model->portfolioImages;

                    $formModel->image = $model->image;

                    $languages = Lang::find()->all();
                    $itemLangs = $model->portfolioLangs;
                    $itemLangs = ArrayHelper::index($itemLangs, 'lang_id');
                    foreach($languages as $language){
                        $itemLang = isset($itemLangs[$language->id]) ? $itemLangs[$language->id] : new PortfolioLang();
                        $formModel->translationTitle[$language->id] = $itemLang->title;
                        $formModel->translationSubtitle[$language->id] = $itemLang->subtitle;
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
                'modelClass' => Portfolio::className(),
                'redirectUrl' => Url::toRoute(['index']),
            ],
            'batch-delete' => [
                'class' => BatchDeleteAction::className(),
                'modelClass' => Portfolio::className(),
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
        $image = UploadedFile::getInstance($formModel, 'image');
        $formModel->image = $image;
        if ($image = $formModel->getImageModel('image')) {
            $model->image_id = $image->id;
            $model->save();
        }

        $images = UploadedFile::getInstances($formModel, 'images');
        foreach($images as $image){
            $formModel->dop_image = $image;
            if ($imageModel = $formModel->getImageModel('dop_image')) {
                $pi = PortfolioImage::find()->where([
                    'image_id' => $imageModel->id,
                    'portfolio_id' => $model->id,
                ])->one();
                $pi = $pi ? $pi : new PortfolioImage();
                $pi->image_id = $imageModel->id;
                $pi->portfolio_id = $model->id;
                $pi->save();
            }
        }

        $model->saveLangsRelations('portfolioLangs', $formModel, 'translationTitle', 'title', 'portfolio_id');
        $model->saveLangsRelations('portfolioLangs', $formModel, 'translationSubtitle', 'subtitle', 'portfolio_id');
        $model->saveLangsRelations('portfolioLangs', $formModel, 'translationDescription', 'description', 'portfolio_id');

        return $model;
    }

    public function actionChangeOrder($id, $order){
        $model = Portfolio::findOne($id);
        $secondModel = null;
        if($order == -1){
            $secondModel = Portfolio::find()->where([
                '<', 'portfolio.orderby', $model->orderby
            ])->orderBy('orderby desc')->one();
        }
        elseif($order == 1){
            $secondModel = Portfolio::find()->where([
                '>', 'portfolio.orderby', $model->orderby
            ])->orderBy('orderby asc')->one();
        }
        $secondModel = $secondModel ? $secondModel : Portfolio::find()->where(['orderby'=>null])->one();
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