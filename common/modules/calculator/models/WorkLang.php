<?php

namespace common\modules\calculator\models;

use common\models\Lang;
use Yii;

/**
 * This is the model class for table "work_lang".
 *
 * @property integer $id
 * @property string $title
 * @property integer $work_id
 * @property integer $lang_id
 * @property double $cost
 *
 * @property Lang $lang
 * @property Work $work
 */
class WorkLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['work_id'], 'required'],
            [['work_id', 'lang_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['cost'], 'number'],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['work_id'], 'exist', 'skipOnError' => true, 'targetClass' => Work::className(), 'targetAttribute' => ['work_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'work_id' => 'Work ID',
            'lang_id' => 'Lang ID',
            'cost' => 'Стоимость',
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
    public function getWork()
    {
        return $this->hasOne(Work::className(), ['id' => 'work_id']);
    }

    /**
     * @inheritdoc
     * @return \common\modules\calculator\models\query\WorkLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\modules\calculator\models\query\WorkLangQuery(get_called_class());
    }

}
