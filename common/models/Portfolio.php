<?php

namespace common\models;

use common\behaviors\LangSaveBehavior;
use common\behaviors\TranslateBehavior;
use Yii;
use yii\db\ActiveQuery;
use yii\db\Expression;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "portfolio".
 *
 * @property integer $id
 * @property integer $image_id
 * @property integer $orderby
 * @property string $alias
 *
 * @property Image $image
 * @property PortfolioImage[] $portfolioImages
 * @property PortfolioLang[] $portfolioLangs
 */
class Portfolio extends \yii\db\ActiveRecord
{
    public $title;
    public $description;
    public $subtitle;

    private $_maxOrder;
    public $max;
    private $_minOrder;
    public $min;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portfolio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias'], 'required'],
            [['image_id', 'orderby'], 'integer'],
            [['alias'], 'string', 'max' => 255],
            [['alias'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Алиас',
        ];
    }

    public function behaviors(){
        return [
            'langSave' => [
                'class' => LangSaveBehavior::className(),
            ],
            'translate' => [
                'class' => TranslateBehavior::className(),
                'translateModelName' => PortfolioLang::className(),
                'relationFieldName' => 'portfolio_id',
                'translateFieldNames' => ['title', 'description', 'subtitle'],
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
    public function getPortfolioImages()
    {
        return $this->hasMany(PortfolioImage::className(), ['portfolio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolioLangs()
    {
        return $this->hasMany(PortfolioLang::className(), ['portfolio_id' => 'id'])->indexBy('lang_id');
    }

    /**
     * @inheritdoc
     * @return \common\models\query\PortfolioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PortfolioQuery(get_called_class());
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
        $expr = new Expression('MAX(portfolio.orderby) as max');
        $query->select($expr);
        $max = $query->one();
        return $max->max;
    }

    public function getMinOrder(){
        $query = self::find();
        $expr = new Expression('MIN(portfolio.orderby) as min');
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
