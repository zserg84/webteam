<?php

namespace common\modules\calculator\models;

use Yii;

/**
 * This is the model class for table "worktype_lang".
 *
 * @property integer $id
 * @property string $title
 * @property integer $worktype_id
 * @property integer $lang_id
 *
 * @property Lang $lang
 * @property Worktype $worktype
 */
class WorktypeLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'worktype_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'worktype_id', 'lang_id'], 'required'],
            [['worktype_id', 'lang_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['worktype_id', 'lang_id'], 'unique', 'targetAttribute' => ['worktype_id', 'lang_id'], 'message' => 'The combination of Worktype ID and Lang ID has already been taken.'],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['worktype_id'], 'exist', 'skipOnError' => true, 'targetClass' => Worktype::className(), 'targetAttribute' => ['worktype_id' => 'id']],
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
            'worktype_id' => 'Worktype ID',
            'lang_id' => 'Lang ID',
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
    public function getWorktype()
    {
        return $this->hasOne(Worktype::className(), ['id' => 'worktype_id']);
    }

    /**
     * @inheritdoc
     * @return \common\modules\calculator\models\query\WorktypeLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\modules\calculator\models\query\WorktypeLangQuery(get_called_class());
    }
}
