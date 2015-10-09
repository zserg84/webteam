<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "portfolio_image".
 *
 * @property integer $id
 * @property integer $portfolio_id
 * @property integer $image_id
 *
 * @property Image $image
 * @property Portfolio $portfolio
 */
class PortfolioImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portfolio_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['portfolio_id', 'image_id'], 'required'],
            [['portfolio_id', 'image_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'portfolio_id' => 'Portfolio ID',
            'image_id' => 'Image ID',
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
    public function getPortfolio()
    {
        return $this->hasOne(Portfolio::className(), ['id' => 'portfolio_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\PortfolioImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PortfolioImageQuery(get_called_class());
    }
}
