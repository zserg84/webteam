<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 23.09.15
 * Time: 11:02
 */

namespace backend\modules\calculator\models\form;


use backend\modules\calculator\models\Work;
use common\validators\EachValidator;
use common\validators\LangRequiredValidator;

class WorkForm extends Work
{
    public $translationTitle = [];
    public $translationCost = [];
    protected $worktype_id;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cost', 'parent_id', 'worktype_id'], 'safe'],
            [['cost', 'parent_id', 'worktype_id'], 'number'],
            [['translationTitle'], EachValidator::className(), 'rule'=>['filter', 'filter'=>'trim']],
            [['translationTitle'], LangRequiredValidator::className(), 'langUrls' => 'ru', 'currentLangRequired' => false],
            [['translationCost'], EachValidator::className(), 'rule'=>['number']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
                'translationTitle' => 'Название',
                'translationCost' => 'Стоимость',
            ]
        );
    }

    public function getWorktypeId(){
        return $this->worktype_id;
    }
} 