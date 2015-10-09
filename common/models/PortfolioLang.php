<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "portfolio_lang".
 *
 * @property integer $id
 * @property integer $portfolio_id
 * @property integer $lang_id
 * @property string $title
 * @property string $description
 * @property string $subtitle
 *
 * @property Lang $lang
 * @property Portfolio $portfolio
 */
class PortfolioLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portfolio_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['portfolio_id', 'lang_id'], 'required'],
            [['portfolio_id', 'lang_id'], 'integer'],
            [['description', 'subtitle'], 'string'],
            [['title'], 'string', 'max' => 64]
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
            'lang_id' => 'Lang ID',
            'title' => 'Title',
            'description' => 'Description',
            'subtitle' => 'Subtitle',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang_id']);
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
     * @return \common\models\query\PortfolioLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PortfolioLangQuery(get_called_class());
    }
}
