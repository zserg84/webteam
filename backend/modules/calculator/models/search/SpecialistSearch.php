<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 22.09.15
 * Time: 17:03
 */

namespace backend\modules\calculator\models\search;

use backend\modules\calculator\models\Specialist;
use common\modules\calculator\models\SpecialistLang;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;

class SpecialistSearch extends Specialist
{

    private $_salaryRu;
    private $_amortizationRu;
    private $_maintenanceRu;
    private $_salaryEn;
    private $_amortizationEn;
    private $_maintenanceEn;

    public function rules(){
        return [
            [['name', 'salaryRu', 'tax', 'amortizationRu', 'maintenanceRu', 'profit', 'usn', 'visible',
                'salaryEn','amortizationEn', 'maintenanceEn'], 'safe'],
        ];
    }

    public function search($params = null)
    {
        $query = self::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

//        $query->lang();

        /*$dataProvider->setSort([
            'defaultOrder' => ['name'=>SORT_ASC],
            'attributes' => [
                'name' => [
                    'asc' => ['specialist_lang.name' => SORT_ASC],
                    'desc' => ['specialist_lang.name' => SORT_DESC],
                ],
                'tax', 'profit', 'usn', 'visible'
            ],
        ]);*/

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        /*$query->andFilterWhere(['LIKE', 'specialist_lang.name', $this->name]);
        $query->andFilterWhere(['=', 'specialist.tax', $this->tax]);
        $query->andFilterWhere(['=', 'specialist.profit', $this->profit]);
        $query->andFilterWhere(['=', 'specialist.usn', $this->usn]);
        $query->andFilterWhere(['=', 'specialist.visible', $this->visible]);

        if($this->_salaryRu){
            $query->andFilterWhere(['=', 'specialist_lang.salary', $this->_salaryRu])->andWhere([
                'specialist_lang.lang_id' => 2
            ]);
        }
        if($this->_salaryEn){
            $query->andFilterWhere(['=', 'specialist_lang.salary', $this->_salaryEn])->andWhere([
                'specialist_lang.lang_id' => 1
            ]);
        }
        if($this->_amortizationRu){
            $query->andFilterWhere(['=', 'specialist_lang.amortization', $this->_amortizationRu])->andWhere([
                'specialist_lang.lang_id' => 2
            ]);
        }
        if($this->_amortizationEn){
            $query->andFilterWhere(['=', 'specialist_lang.amortization', $this->_amortizationEn])->andWhere([
                'specialist_lang.lang_id' => 1
            ]);
        }
        if($this->_maintenanceRu){
            $query->andFilterWhere(['=', 'specialist_lang.maintenance', $this->_maintenanceRu])->andWhere([
                'specialist_lang.lang_id' => 2
            ]);
        }
        if($this->_maintenanceEn){
            $query->andFilterWhere(['=', 'specialist_lang.maintenance', $this->_maintenanceEn])->andWhere([
                'specialist_lang.lang_id' => 1
            ]);
        }*/
        return $dataProvider;
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
                'name' => 'Название',
                'tax' => 'Налоги, % от зарплаты',
                'salaryRu' => 'Зарплата, тыс.р',
                'amortizationRu' => 'Амортизация, тыс.р',
                'maintenanceRu' => 'Содержание, тыс.р',
                'salaryEn' => 'Зарплата, $',
                'amortizationEn' => 'Амортизация, $',
                'maintenanceEn' => 'Содержание, $',
                'profit' => 'Прибыль Web Team, % от зарплаты',
                'usn' => 'Налог УСН, % от всего',
            ]
        );
    }

    public function getSalaryRu(){
        if($this->_salaryRu)
            return $this->_salaryRu;
        $sl = SpecialistLang::findOne([
            'lang_id' => 2,
            'specialist_id' => $this->id
        ]);
        return $sl ? $sl->salary : null;
    }
    public function setSalaryRu($value){
        $this->_salaryRu = $value;
    }

    public function getSalaryEn(){
        if($this->_salaryEn)
            return $this->_salaryEn;
        $sl = SpecialistLang::findOne([
            'lang_id' => 1,
            'specialist_id' => $this->id
        ]);
        return $sl ? $sl->salary : null;
    }
    public function setSalaryEn($value){
        $this->_salaryEn = $value;
    }

    public function getAmortizationRu(){
        if($this->_amortizationRu)
            return $this->_amortizationRu;
        $sl = SpecialistLang::findOne([
            'lang_id' => 2,
            'specialist_id' => $this->id
        ]);
        return $sl ? $sl->amortization : null;
    }
    public function setAmortizationRu($value){
        $this->_amortizationRu = $value;
    }
    public function getAmortizationEn(){
        if($this->_amortizationEn)
            return $this->_amortizationEn;
        $sl = SpecialistLang::findOne([
            'lang_id' => 1,
            'specialist_id' => $this->id
        ]);
        return $sl ? $sl->amortization : null;
    }
    public function setAmortizationEn($value){
        $this->_amortizationEn = $value;
    }

    public function getMaintenanceRu(){
        if($this->_maintenanceRu)
            return $this->_maintenanceRu;
        $sl = SpecialistLang::findOne([
            'lang_id' => 2,
            'specialist_id' => $this->id
        ]);
        return $sl ? $sl->maintenance : null;
    }
    public function setMaintenanceRu($value){
        $this->_maintenanceRu = $value;
    }
    public function getMaintenanceEn(){
        if($this->_maintenanceEn)
            return $this->_maintenanceEn;
        $sl = SpecialistLang::findOne([
            'lang_id' => 1,
            'specialist_id' => $this->id
        ]);
        return $sl ? $sl->maintenance : null;
    }
    public function setMaintenanceEn($value){
        $this->_maintenanceEn = $value;
    }

} 