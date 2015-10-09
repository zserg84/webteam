<?php

namespace common\modules\calculator\models;

use common\behaviors\LangSaveBehavior;
use common\behaviors\TranslateBehavior;
use Yii;

/**
 * This is the model class for table "work".
 *
 * @property integer $id
 * @property integer $worktype_id
 * @property integer $parent_id
 * @property double $cost
 *
 * @property Work $parent
 * @property Work[] $works
 * @property Worktype $worktype
 * @property WorkLang[] $workLangs
 */
class Work extends \yii\db\ActiveRecord
{
    public $title;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['worktype_id'], 'required'],
            [['worktype_id', 'parent_id'], 'integer'],
            [['cost'], 'number'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Work::className(), 'targetAttribute' => ['parent_id' => 'id']],
            [['worktype_id'], 'exist', 'skipOnError' => true, 'targetClass' => Worktype::className(), 'targetAttribute' => ['worktype_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'worktype_id' => 'Тип',
            'parent_id' => 'Родитель',
            'cost' => 'Стоимость',
        ];
    }

    public function behaviors(){
        return [
            'langSave' => [
                'class' => LangSaveBehavior::className(),
            ],
            'translate' => [
                'class' => TranslateBehavior::className(),
                'translateModelName' => WorkLang::className(),
                'relationFieldName' => 'work_id',
                'translateFieldNames' => ['title'],
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Work::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorks()
    {
        return $this->hasMany(Work::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorktype()
    {
        return $this->hasOne(Worktype::className(), ['id' => 'worktype_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkLangs()
    {
        return $this->hasMany(WorkLang::className(), ['work_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\modules\calculator\models\query\WorkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\modules\calculator\models\query\WorkQuery(get_called_class());
    }
}
