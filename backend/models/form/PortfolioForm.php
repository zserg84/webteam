<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 08.09.15
 * Time: 16:22
 */

namespace backend\models\form;


use backend\models\Portfolio;
use common\behaviors\ImageBehavior;
use common\validators\EachValidator;
use common\validators\LangRequiredValidator;

class PortfolioForm extends Portfolio
{

    public $image;
    public $dop_image;
    public $images = [];
    public $translationTitle = [];
    public $translationDescription = [];
    public $translationSubtitle = [];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['images', 'dop_image'], 'safe'],
            [['alias'], 'required'],
            [['translationTitle', 'translationDescription', 'translationSubtitle'], EachValidator::className(), 'rule'=>['filter', 'filter'=>'trim']],
            [['image'], 'file', 'mimeTypes'=> ['image/png', 'image/jpeg', 'image/gif'], 'wrongMimeType' => 'Недопустимый тип файла'],
            [['translationTitle', 'translationDescription'], LangRequiredValidator::className(), 'langUrls' => 'ru', 'currentLangRequired' => false],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
                'translationTitle' => 'Название',
                'translationSubtitle' => 'Под названием',
                'translationDescription' => 'Описание',
                'image' => 'Обложка',
                'images' => 'Картинки',
            ]
        );
    }

    public function behaviors()
    {
        return [
            'imageBehavior' => [
                'class' => ImageBehavior::className(),
            ]
        ];
    }
} 