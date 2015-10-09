<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 22.09.15
 * Time: 17:03
 */

namespace backend\modules\calculator\models\search;

use backend\modules\calculator\models\Specialist;
use yii\data\ActiveDataProvider;

class SpecialistSearch extends Specialist
{

    public function rules(){
        return [
            [['name', 'salary', 'tax', 'amortization', 'maintenance', 'profit', 'usn', 'visible'], 'safe'],
        ];
    }

    public function search($params = null)
    {
        $query = self::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->lang();

        $dataProvider->setSort([
            'defaultOrder' => ['name'=>SORT_ASC],
            'attributes' => [
                'name' => [
                    'asc' => ['specialist_lang.name' => SORT_ASC],
                    'desc' => ['specialist_lang.name' => SORT_DESC],
                ],
                'salary', 'tax', 'amortization', 'maintenance', 'profit', 'usn', 'visible'
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['LIKE', 'specialist_lang.name', $this->name]);
        $query->andFilterWhere(['=', 'specialist.salary', $this->salary]);
        $query->andFilterWhere(['=', 'specialist.tax', $this->tax]);
        $query->andFilterWhere(['=', 'specialist.amortization', $this->amortization]);
        $query->andFilterWhere(['=', 'specialist.maintenance', $this->maintenance]);
        $query->andFilterWhere(['=', 'specialist.profit', $this->profit]);
        $query->andFilterWhere(['=', 'specialist.usn', $this->usn]);
        $query->andFilterWhere(['=', 'specialist.visible', $this->visible]);

        return $dataProvider;
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
                'name' => 'Название',
            ]
        );
    }
} 