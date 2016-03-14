<?php

namespace common\modules\calculator\models;

use Yii;

/**
 * This is the model class for table "specialist_lang".
 *
 * @property integer $id
 * @property string $name
 * @property integer $specialist_id
 * @property integer $lang_id
 * @property double $salary
 * @property double $amortization
 * @property double $maintenance
 *
 * @property Lang $lang
 * @property Specialist $specialist
 */
class SpecialistLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'specialist_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['specialist_id', 'lang_id'], 'required'],
            [['specialist_id', 'lang_id'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['salary', 'amortization', 'maintenance'], 'number'],
            [['specialist_id', 'lang_id'], 'unique', 'targetAttribute' => ['specialist_id', 'lang_id'], 'message' => 'The combination of Specialist ID and Lang ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'specialist_id' => 'Specialist ID',
            'lang_id' => 'Lang ID',
            'salary' => 'Зарплата',
            'amortization' => 'Амортизация',
            'maintenance' => 'Содержание',
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
    public function getSpecialist()
    {
        return $this->hasOne(Specialist::className(), ['id' => 'specialist_id']);
    }

    /**
     * @inheritdoc
     * @return \common\modules\calculator\models\query\SpecialistLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\modules\calculator\models\query\SpecialistLangQuery(get_called_class());
    }
}
