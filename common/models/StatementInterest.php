<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "statement_interest".
 *
 * @property integer $id
 * @property string $name
 *
 * @property StatementLetter[] $statementLetters
 */
class StatementInterest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'statement_interest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Тип интереса',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatementLetters()
    {
        return $this->hasMany(StatementLetter::className(), ['interest_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\InterestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\InterestQuery(get_called_class());
    }
}
