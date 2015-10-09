<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 08.09.15
 * Time: 13:47
 */

namespace backend\models\search;

use backend\models\Recall;
use yii\data\ActiveDataProvider;

class RecallSearch extends Recall
{
    public function rules(){
        return [
            [['text', 'company', 'member'], 'safe'],
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
                    'asc' => ['recall.orderby' => SORT_ASC],
                    'desc' => ['recall.orderby' => SORT_DESC],
                ],
                'text' => [
                    'asc' => ['recall_lang.text' => SORT_ASC],
                    'desc' => ['recall_lang.text' => SORT_DESC],
                    'default' => SORT_ASC
                ],
                'company' => [
                    'asc' => ['recall_lang.company' => SORT_ASC],
                    'desc' => ['recall_lang.company' => SORT_DESC],
                ],
                'member' => [
                    'asc' => ['recall_lang.member' => SORT_ASC],
                    'desc' => ['recall_lang.member' => SORT_DESC],
                ],
            ]
        ]);

        $query->lang();

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['LIKE', 'recall_lang.text', $this->text]);
        $query->andFilterWhere(['LIKE', 'recall_lang.member' , $this->member]);
        $query->andFilterWhere(['LIKE', 'recall_lang.company' , $this->company]);

        return $dataProvider;
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
                'text' => 'Текст',
                'member' => 'ФИО',
                'company' => 'Компания',
            ]
        );
    }
} 