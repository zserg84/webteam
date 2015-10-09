<?php

namespace common\models;

use common\behaviors\LangSaveBehavior;
use common\behaviors\TranslateBehavior;
use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "team".
 *
 * @property integer $id
 * @property integer $black_image_id
 * @property integer $color_image_id
 * @property integer $orderby
 *
 * @property Image $colorImage
 * @property Image $blackImage
 * @property TeamLang[] $teamLangs
 */
class Team extends \yii\db\ActiveRecord
{

    public $surname;
    public $name;
    public $position;
    public $description;

    private $_maxOrder;
    public $max;
    private $_minOrder;
    public $min;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['black_image_id', 'color_image_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'black_image_id' => 'Чёрно-белое фото',
            'color_image_id' => 'Цветное фото',
        ];
    }

    public function behaviors(){
        return [
            'langSave' => [
                'class' => LangSaveBehavior::className(),
            ],
            'translate' => [
                'class' => TranslateBehavior::className(),
                'translateModelName' => TeamLang::className(),
                'relationFieldName' => 'team_id',
                'translateFieldNames' => ['surname', 'name', 'position', 'description'],
            ],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColorImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'color_image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBlackImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'black_image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeamLangs()
    {
        return $this->hasMany(TeamLang::className(), ['team_id' => 'id'])->indexBy('lang_id');
    }

    /**
     * @inheritdoc
     * @return \common\models\query\TeamQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\TeamQuery(get_called_class());
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
        $expr = new Expression('MAX(team.orderby) as max');
        $query->select($expr);
        $max = $query->one();
        return $max->max;
    }

    public function getMinOrder(){
        $query = self::find();
        $expr = new Expression('MIN(team.orderby) as min');
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
