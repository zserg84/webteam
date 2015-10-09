<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 10.09.15
 * Time: 14:37
 */

namespace backend\models\form;


use backend\models\Team;
use common\behaviors\ImageBehavior;
use common\validators\EachValidator;
use common\validators\LangRequiredValidator;

class TeamForm extends Team
{

    public $black_image;
    public $color_image;
    public $translationSurname = [];
    public $translationName = [];
    public $translationPosition = [];
    public $translationDescription = [];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['translationSurname', 'translationName', 'translationPosition', 'translationDescription'], EachValidator::className(), 'rule'=>['filter', 'filter'=>'trim']],
            [['black_image', 'color_image'], 'file', 'mimeTypes'=> ['image/png', 'image/jpeg', 'image/gif'], 'wrongMimeType' => 'Недопустимый тип файла'],
            [['translationSurname', 'translationName', 'translationPosition'], LangRequiredValidator::className(), 'langUrls' => 'ru', 'currentLangRequired' => false],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
                'translationSurname' => 'Фамилия',
                'translationName' => 'Имя',
                'translationPosition' => 'Должность',
                'translationDescription' => 'Описание',
                'black_image' => 'Чёрно-белое фото',
                'color_image' => 'Цветное фото',
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