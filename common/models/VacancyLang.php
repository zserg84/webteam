<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vacancy_lang".
 *
 * @property integer $id
 * @property integer $vacancy_id
 * @property integer $lang_id
 * @property string $title
 * @property string $description
 *
 * @property Lang $lang
 * @property Vacancy $vacancy
 */
class VacancyLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacancy_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vacancy_id', 'lang_id', 'title'], 'required'],
            [['vacancy_id', 'lang_id'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 50],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['vacancy_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vacancy::className(), 'targetAttribute' => ['vacancy_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vacancy_id' => 'Vacancy ID',
            'lang_id' => 'Lang ID',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancy()
    {
        return $this->hasOne(Vacancy::className(), ['id' => 'vacancy_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\VacancyLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\VacancyLangQuery(get_called_class());
    }
}
