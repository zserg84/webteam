<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 22.09.15
 * Time: 17:09
 */
namespace backend\modules\calculator\models\form;

use backend\modules\calculator\models\Specialist;
use common\validators\EachValidator;
use common\validators\LangRequiredValidator;

class SpecialistForm extends Specialist
{

    public $translationName = [];
    public $translationSalary = [];
    public $translationAmortization = [];
    public $translationMaintenance = [];
    public $visible = 1;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tax','profit', 'usn', 'translationSalary', 'translationAmortization', 'translationMaintenance'], 'safe'],
            [['tax', 'profit', 'usn'], 'number'],
            [['visible'], 'default', 'value'=>1],
            [['translationName',], EachValidator::className(), 'rule'=>['filter', 'filter'=>'trim']],
            [['translationSalary', 'translationAmortization', 'translationMaintenance'], EachValidator::className(), 'rule'=>['filter', 'filter'=>function($value){
                return $value ? : 0;
            }]],
            [['translationName'], LangRequiredValidator::className(), 'langUrls' => 'ru', 'currentLangRequired' => false],
            [['translationSalary', 'translationAmortization', 'translationMaintenance'], EachValidator::className(), 'rule'=>['number']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
                'translationName' => 'Название',
                'translationSalary_1' => 'Зарплата, $',
                'translationAmortization_1' => 'Амортизация, $',
                'translationMaintenance_1' => 'Содержание, $',
                'translationSalary_2' => 'Зарплата, тыс.р',
                'translationAmortization_2' => 'Амортизация, тыс.р',
                'translationMaintenance_2' => 'Содержание, тыс.р',
            ]
        );
    }
} 