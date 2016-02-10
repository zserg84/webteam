<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 02.02.16
 * Time: 11:35
 */

namespace backend\models\form;


use common\behaviors\ImageBehavior;
use common\models\Lang;

class LangForm extends Lang
{
    public $image;

    /**
     * @inheritdoc
     */
    public function rules(){
        return array_merge(parent::rules(), [
            [['image'], 'file', 'mimeTypes'=> ['image/png', 'image/jpeg', 'image/gif'], 'wrongMimeType'=>'Недопустимый тип файла jpg, png, gif'],
        ]);
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