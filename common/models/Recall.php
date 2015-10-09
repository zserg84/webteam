<?php

namespace common\models;

use common\behaviors\LangSaveBehavior;
use common\behaviors\TranslateBehavior;
use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "recall".
 *
 * @property integer $id
 * @property integer $image_id
 * @property integer $orderby
 *
 * @property Image $image
 * @property RecallLang[] $recallLangs
 */
class Recall extends \yii\db\ActiveRecord
{
    public $text;
    public $member;
    public $company;

    private $_maxOrder;
    public $max;
    private $_minOrder;
    public $min;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recall';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image_id' => 'Image ID',
        ];
    }

    public function behaviors(){
        return [
            'langSave' => [
                'class' => LangSaveBehavior::className(),
            ],
            'translate' => [
                'class' => TranslateBehavior::className(),
                'translateModelName' => RecallLang::className(),
                'relationFieldName' => 'recall_id',
                'translateFieldNames' => ['text', 'member', 'company'],
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecallLangs()
    {
        return $this->hasMany(RecallLang::className(), ['recall_id' => 'id'])->indexBy('lang_id');
    }

    /**
     * @inheritdoc
     * @return \common\models\query\RecallQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\RecallQuery(get_called_class());
    }

    public function beforeSave($insert){
        if(!$this->orderby){
            $maxOrder = $this->getMaxOrder();
            $this->orderby = $maxOrder ? $maxOrder + 1 : 1;
        }

        return parent::beforeSave($insert);
    }

    public function getMaxOrder(){
        $query = self::find();
        $expr = new Expression('MAX(recall.orderby) as max');
        $query->select($expr);
        $max = $query->one();
        return $max->max;
    }

    public function getMinOrder(){
        $query = self::find();
        $expr = new Expression('MIN(recall.orderby) as min');
        $query->select($expr);
        $min = $query->one();
        return $min->min;
    }

    public function isMaxOrder(){
        return $this->maxOrder == $this->orderby;
    }

    public function isMinOrder(){
        return $this->minOrder == $this->orderby;
    }
}
