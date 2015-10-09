<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "recall_lang".
 *
 * @property integer $id
 * @property integer $recall_id
 * @property string $text
 * @property string $company
 * @property string $member
 *
 * @property Recall $recall
 */
class RecallLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recall_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recall_id'], 'required'],
            [['recall_id'], 'integer'],
            [['text'], 'string'],
            [['company', 'member'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'recall_id' => 'Recall ID',
            'text' => 'Text',
            'company' => 'Company',
            'member' => 'Member',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecall()
    {
        return $this->hasOne(Recall::className(), ['id' => 'recall_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\RecallLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\RecallLangQuery(get_called_class());
    }
}
