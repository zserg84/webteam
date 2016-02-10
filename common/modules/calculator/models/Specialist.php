<?php

namespace common\modules\calculator\models;

use common\behaviors\LangSaveBehavior;
use common\behaviors\TranslateBehavior;
use Yii;

/**
 * This is the model class for table "specialist".
 *
 * @property integer $id
 * @property integer $visible
 * @property double $salary
 * @property double $tax
 * @property double $amortization
 * @property double $maintenance
 * @property double $profit
 * @property double $usn
 *
 * @property SpecialistLang[] $specialistLangs
 */
class Specialist extends \yii\db\ActiveRecord
{
    public $name;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'specialist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['visible'], 'integer'],
            [['salary', 'tax', 'amortization', 'maintenance', 'profit', 'usn'], 'number']
        ];
    }

    public function behaviors(){
        return [
            'langSave' => [
                'class' => LangSaveBehavior::className(),
            ],
            'translate' => [
                'class' => TranslateBehavior::className(),
                'translateModelName' => SpecialistLang::className(),
                'relationFieldName' => 'specialist_id',
                'translateFieldNames' => ['name'],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'visible' => 'Показывать на сайте',
            'salary' => 'Зарплата',
            'tax' => 'Налоги',
            'amortization' => 'Амортизация',
            'maintenance' => 'Содержание',
            'profit' => 'Прибыль Web Team',
            'usn' => 'Налог УСН',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialistLangs()
    {
        return $this->hasMany(SpecialistLang::className(), ['specialist_id' => 'id'])->indexBy('lang_id');
    }

    /**
     * @inheritdoc
     * @return \common\modules\calculator\models\query\SpecialistQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\modules\calculator\models\query\SpecialistQuery(get_called_class());
    }

    public function getSalary(){
        return ceil(10*$this->salary) / 10;
    }

    public function getTax(){
        return ceil(10*$this->tax * $this->salary / 100) / 10;
    }

    public function getAmortization(){
        return ceil(10*$this->amortization) / 10;
    }

    public function getMaintenance(){
        return ceil(10*$this->maintenance) / 10;
    }

    public function getProfit(){
        return ceil(10*$this->profit * $this->salary / 100) / 10;
    }

    public function getUsn(){
        $sum = $this->getSalary() + $this->getTax() + $this->getAmortization() + $this->getMaintenance() + $this->getProfit();
        $usn = $this->usn * $sum / (100 - $this->usn);
        return ceil(10 * $usn)/10;
    }
}
