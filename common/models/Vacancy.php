<?php

namespace common\models;

use common\behaviors\LangSaveBehavior;
use common\behaviors\TranslateBehavior;
use Yii;

/**
 * This is the model class for table "vacancy".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $image_id
 *
 * @property Image $image
 * @property VacancyLang[] $vacancyLangs
 */
class Vacancy extends \yii\db\ActiveRecord
{

    public $title;
    public $description;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacancy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['image_id'], 'integer'],
            [['title'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'image_id' => 'Картинка',
        ];
    }

    public function behaviors(){
        return [
            'langSave' => [
                'class' => LangSaveBehavior::className(),
            ],
            'translate' => [
                'class' => TranslateBehavior::className(),
                'translateModelName' => VacancyLang::className(),
                'relationFieldName' => 'vacancy_id',
                'translateFieldNames' => ['title', 'description'],
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancyLangs()
    {
        return $this->hasMany(VacancyLang::className(), ['vacancy_id' => 'id']);
    }


    /**
     * @inheritdoc
     * @return \common\models\query\VacancyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\VacancyQuery(get_called_class());
    }
}
