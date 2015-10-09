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

class VacancyForm extends Vacancy
{

    public $image;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'safe'],
            [['title'], 'required'],
            [['image'], 'file', 'mimeTypes'=> ['image/png', 'image/jpeg', 'image/gif'], 'wrongMimeType' => 'Недопустимый тип файла'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
                'image' => 'Картинка',
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