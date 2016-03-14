<?php

namespace common\modules\calculator\models;

use common\behaviors\LangSaveBehavior;
use common\behaviors\TranslateBehavior;
use common\models\Lang;
use Yii;

/**
 * This is the model class for table "specialist".
 *
 * @property integer $id
 * @property integer $visible
 * @property double $tax
 * @property double $profit
 * @property double $usn
 *
 * @property SpecialistLang[] $specialistLangs
 */
class Specialist extends \yii\db\ActiveRecord
{
    public $name;
    public $salary;
    public $amortization;
    public $maintenance;

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
            [['tax', 'profit', 'usn'], 'number']
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
                'translateFieldNames' => ['name', 'salary', 'amortization', 'maintenance'],
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

    public function getSpecialistLang(){
        return SpecialistLang::findOne([
            'specialist_id' => $this->id,
            'lang_id' => Lang::getCurrent()->id
        ]);
    }

    public function getSalary(){
        $sl = $this->getSpecialistLang();
        if($sl)
            return ceil(10*$sl->salary) / 10;
    }

    public function getTax(){
        return ceil(10*$this->tax * $this->salary / 100) / 10;
    }

    public function getAmortization(){
        $sl = $this->getSpecialistLang();
        if($sl)
            return ceil(10*$sl->amortization) / 10;
    }

    public function getMaintenance(){
        $sl = $this->getSpecialistLang();
        if($sl)
            return ceil(10*$sl->maintenance) / 10;
    }

    public function getProfit(){
        return ceil(10*$this->profit * $this->getSalary() / 100) / 10;
    }

    public function getUsn(){
        $sum = $this->getSalary() + $this->getTax() + $this->getAmortization() + $this->getMaintenance() + $this->getProfit();
        $usn = $this->usn * $sum / (100 - $this->usn);
        return ceil(10 * $usn)/10;
    }
}
