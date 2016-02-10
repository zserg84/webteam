<?php

namespace common\models;

use common\behaviors\TranslateBehavior;
use Yii;

/**
 * This is the model class for table "statement_interest".
 *
 * @property integer $id
 * @property string $name
 *
 * @property StatementInterestLang[] $statementInterestLangs
 * @property StatementLetter[] $statementLetters
 */
class StatementInterest extends \yii\db\ActiveRecord
{
    public $name;

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

    public function behaviors(){
        return [
            'translate' => [
                'class' => TranslateBehavior::className(),
                'translateModelName' => StatementInterestLang::className(),
                'relationFieldName' => 'statement_interest_id',
                'translateFieldNames' => ['name'],
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatementInterestLangs()
    {
        return $this->hasMany(StatementInterestLang::className(), ['statement_interest_id' => 'id']);
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
