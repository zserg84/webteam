<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "statement_letter".
 *
 * @property integer $id
 * @property string $fio
 * @property string $email
 * @property string $phone
 * @property integer $interest_id
 * @property string $text
 * @property integer $created_at
 * @property integer $sent_at
 * @property string $page
 * @property string $from
 *
 * @property StatementInterest $statementInterest
 */
class StatementLetter extends \yii\db\ActiveRecord
{
    const FROM_MAIN = 1;
    const FROM_MAIN_FLY = 2;
    const FROM_SERVICE = 3;
    const FROM_PORTFOLIO_FLY = 4;
    const FROM_VACANCY = 5;
    const FROM_CALCULATOR = 6;

    const SCENARIO_CALCULATOR = 'calculator';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'statement_letter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fio','email'], 'filter', 'filter' => 'trim'],
            [['fio', 'email', 'interest_id'], 'required'],
            [['interest_id', 'created_at', 'sent_at'], 'integer'],
            [['text'], 'string'],
            [['fio', 'from'], 'string', 'max' => 255],
            [['email', 'phone'], 'string', 'max' => 64],
            [['email'], 'email'],
            [['phone'], 'match', 'pattern'=>'/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{6,10}$/', 'message' => 'неправильный формат телефона'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Имя',
            'email' => 'Почта',
            'phone' => 'Телефон',
            'interest_id' => 'Тип интереса',
            'text' => 'Text',
            'created_at' => 'Время заявки',
            'sent_at' => 'Время отправки на почту',
            'from' => 'Источник',
        ];
    }

    public function behaviors(){
        return [
            'timestampBehavior' => [
                'class' => TimestampBehavior::className(),
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatementInterest()
    {
        return $this->hasOne(StatementInterest::className(), ['id' => 'interest_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\StatementLetterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\StatementLetterQuery(get_called_class());
    }

    public static function getFromArray(){
        return [
            self::FROM_MAIN => 'Главная страница',
            self::FROM_MAIN_FLY => 'Главная страница(боковая)',
            self::FROM_SERVICE => 'Услуги',
            self::FROM_PORTFOLIO_FLY => 'Портфолио(боковая)',
            self::FROM_VACANCY => 'Вакансии',
            self::FROM_CALCULATOR => 'Калькулятор',
        ];
    }

    public static function getFromValue($from){
        $arr = self::getFromArray();
        if(isset($arr[$from]))
            return $arr[$from];
        return null;
    }

    public function scenarios(){
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CALCULATOR] = [
            'fio', 'email', 'phone', 'text'
        ];
        return $scenarios;
    }
}
