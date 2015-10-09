<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 08.09.15
 * Time: 16:24
 */

namespace backend\models\search;


use backend\models\Portfolio;
use yii\data\ActiveDataProvider;

class PortfolioSearch extends Portfolio
{

    public function rules(){
        return [
            [['title', 'description'], 'safe'],
        ];
    }

    public function search($params = null)
    {
        $query = self::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'defaultOrder' => ['orderby'=>SORT_ASC],
            'attributes' => [
                'id',
                'orderby' => [
                    'asc' => ['portfolio.orderby' => SORT_ASC],
                    'desc' => ['portfolio.orderby' => SORT_DESC],
                ],
                'title' => [
                    'asc' => ['portfolio_lang.title' => SORT_ASC],
                    'desc' => ['portfolio_lang.title' => SORT_DESC],
                    'default' => SORT_ASC
                ],
                'description' => [
                    'asc' => ['portfolio_lang.description' => SORT_ASC],
                    'desc' => ['portfolio_lang.description' => SORT_DESC],
                ],
            ],
        ]);

        $query->lang();

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['LIKE', 'portfolio_lang.orderby', $this->orderby]);
        $query->andFilterWhere(['LIKE', 'portfolio_lang.title', $this->title]);
        $query->andFilterWhere(['LIKE', 'portfolio_lang.description' , $this->description]);

        return $dataProvider;
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
                'title' => 'Название',
                'description' => 'Описание',
            ]
        );
    }
} 