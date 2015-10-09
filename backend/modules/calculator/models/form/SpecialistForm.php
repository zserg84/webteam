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
    public $visible = 1;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['salary', 'tax', 'amortization', 'maintenance', 'profit', 'usn'], 'safe'],
            [['salary', 'tax', 'amortization', 'maintenance', 'profit', 'usn'], 'number'],
            [['visible'], 'default', 'value'=>1],
            [['translationName'], EachValidator::className(), 'rule'=>['filter', 'filter'=>'trim']],
            [['translationName'], LangRequiredValidator::className(), 'langUrls' => 'ru', 'currentLangRequired' => false],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
                'translationName' => 'Название',
            ]
        );
    }
} 