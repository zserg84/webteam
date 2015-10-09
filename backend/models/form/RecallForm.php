<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 22.06.15
 * Time: 12:51
 */

namespace backend\models\form;


use backend\models\Recall;
use common\behaviors\ImageBehavior;
use yii\validators\EachValidator;
use common\validators\LangRequiredValidator;
use yii\base\Model;

class RecallForm extends Recall
{

    const SCENARIO_AJAX = 'ajax';

    public $image_cover;
    public $translationText = [];
    public $translationMember = [];
    public $translationCompany = [];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['translationText', 'translationMember', 'translationCompany'], EachValidator::className(), 'rule'=>['filter', 'filter'=>'trim']],
            [['image_cover'], 'file', 'skipOnEmpty'=>false, 'mimeTypes'=> ['image/png', 'image/jpeg', 'image/gif'], 'wrongMimeType' => 'Недопустимый тип файла', 'on' => self::SCENARIO_DEFAULT],
            [['translationText', 'translationMember', 'translationCompany'], LangRequiredValidator::className(), 'langUrls' => 'ru', 'currentLangRequired' => false],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
                'translationText' => 'Текст',
                'translationMember' => 'ФИО',
                'translationCompany' => 'Компания',
                'image_cover' => 'Картинка',
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

    public function scenarios(){
        return [
            self::SCENARIO_AJAX => ['translationText', 'translationMember', 'translationCompany'],
            self::SCENARIO_DEFAULT => ['translationText', 'translationMember', 'translationCompany', 'image_cover'],
        ];
    }
} 