<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 10.09.15
 * Time: 14:32
 */

namespace backend\models\search;


use backend\models\Team;
use yii\data\ActiveDataProvider;

class TeamSearch extends Team
{
    public function rules(){
        return [
            [['surname', 'name', 'position'], 'safe'],
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
                    'asc' => ['team.orderby' => SORT_ASC],
                    'desc' => ['team.orderby' => SORT_DESC],
                ],
                'surname' => [
                    'asc' => ['team_lang.surname' => SORT_ASC],
                    'desc' => ['team_lang.surname' => SORT_DESC],
                    'default' => SORT_ASC
                ],
                'name' => [
                    'asc' => ['team_lang.name' => SORT_ASC],
                    'desc' => ['team_lang.name' => SORT_DESC],
                ],
                'position' => [
                    'asc' => ['team_lang.position' => SORT_ASC],
                    'desc' => ['team_lang.position' => SORT_DESC],
                ],
            ]
        ]);

        $query->lang();

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['LIKE', 'team_lang.surname', $this->surname]);
        $query->andFilterWhere(['LIKE', 'team_lang.name' , $this->name]);
        $query->andFilterWhere(['LIKE', 'team_lang.position' , $this->position]);

        return $dataProvider;
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
                'surname' => 'Фамилия',
                'name' => 'Имя',
                'position' => 'Должность',
            ]
        );
    }
} 