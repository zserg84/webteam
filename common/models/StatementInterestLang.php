<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "statement_interest_lang".
 *
 * @property integer $id
 * @property integer $statement_interest_id
 * @property integer $lang_id
 * @property string $name
 *
 * @property Lang $lang
 * @property StatementInterest $statementInterest
 */
class StatementInterestLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'statement_interest_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['statement_interest_id', 'lang_id', 'name'], 'required'],
            [['statement_interest_id', 'lang_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
            [['statement_interest_id'], 'exist', 'skipOnError' => true, 'targetClass' => StatementInterest::className(), 'targetAttribute' => ['statement_interest_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'statement_interest_id' => 'Statement Interest ID',
            'lang_id' => 'Lang ID',
            'name' => 'Name',
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
    public function getStatementInterest()
    {
        return $this->hasOne(StatementInterest::className(), ['id' => 'statement_interest_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\StatementInterestLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\StatementInterestLangQuery(get_called_class());
    }
}
