<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 11.09.15
 * Time: 16:49
 */

namespace backend\models\search;

use backend\models\StatementLetter;
use yii\data\ActiveDataProvider;

class StatementLetterSearch extends StatementLetter
{

    public function rules(){
        return [
            [['fio', 'email', 'phone', 'created_at', 'interest_id'], 'safe'],
            [['created_at', 'sent_at'], 'date', 'format' => 'd.m.Y']
        ];
    }

    public function search($params = null)
    {
        $query = self::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'defaultOrder' => ['created_at'=>SORT_DESC],
            'attributes' => [
                'id',
                'fio' => [
                    'asc' => ['statement_letter.fio' => SORT_ASC],
                    'desc' => ['statement_letter.fio' => SORT_DESC],
                ],
                'email' => [
                    'asc' => ['statement_letter.email' => SORT_ASC],
                    'desc' => ['statement_letter.email' => SORT_DESC],
                    'default' => SORT_ASC
                ],
                'phone' => [
                    'asc' => ['statement_letter.phone' => SORT_ASC],
                    'desc' => ['statement_letter.phone' => SORT_DESC],
                ],
                'interest_id' => [
                    'asc' => ['statement_letter.interest_id' => SORT_ASC],
                    'desc' => ['statement_letter.interest_id' => SORT_DESC],
                ],
                'created_at' => [
                    'asc' => ['statement_letter.created_at' => SORT_ASC],
                    'desc' => ['statement_letter.created_at' => SORT_DESC],
                ],
                'sent_at' => [
                    'asc' => ['statement_letter.sent_at' => SORT_ASC],
                    'desc' => ['statement_letter.sent_at' => SORT_DESC],
                ],
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['LIKE', 'statement_letter.fio', $this->fio]);
        $query->andFilterWhere(['LIKE', 'statement_letter.email' , $this->email]);
        $query->andFilterWhere(['LIKE', 'statement_letter.phone' , $this->phone]);
        $query->andFilterWhere(['=', 'statement_letter.interest_id' , $this->interest_id]);
        $query->andFilterWhere(['=', 'FROM_UNIXTIME(created_at, "%d.%m.%Y")' , $this->created_at]);
        $query->andFilterWhere(['=', 'FROM_UNIXTIME(sent_at, "%d.%m.%Y")' , $this->sent_at]);
        $query->andFilterWhere(['=', 'statement_letter.interest_id', $this->interest_id]);

        return $dataProvider;
    }
} 