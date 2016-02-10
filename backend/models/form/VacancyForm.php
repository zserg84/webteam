<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 09.09.15
 * Time: 13:42
 */

namespace backend\models\form;


use backend\models\Vacancy;
use common\behaviors\ImageBehavior;
use common\validators\EachValidator;
use common\validators\LangRequiredValidator;

class VacancyForm extends Vacancy
{

    public $image;
    public $translationTitle = [];
    public $translationDescription = [];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['translationTitle', 'translationDescription'], EachValidator::className(), 'rule'=>['filter', 'filter'=>'trim']],
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
                'image' => 'Картинка',
                'translationTitle' => 'Название',
                'translationDescription' => 'Описание',
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