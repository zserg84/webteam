<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 09.09.15
 * Time: 13:40
 */

namespace backend\models\search;


use backend\models\Vacancy;
use yii\data\ActiveDataProvider;

class VacancySearch extends Vacancy
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
            'attributes' => [
                'id',
                'orderby' => [
                    'asc' => ['vacancy.orderby' => SORT_ASC],
                    'desc' => ['vacancy.orderby' => SORT_DESC],
                ],
                'surname' => [
                    'asc' => ['vacancy.title' => SORT_ASC],
                    'desc' => ['vacancy.title' => SORT_DESC],
                    'default' => SORT_ASC
                ],
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['LIKE', 'vacancy.title', $this->title]);
        $query->andFilterWhere(['LIKE', 'vacancy.description' , $this->description]);

        return $dataProvider;
    }
} 