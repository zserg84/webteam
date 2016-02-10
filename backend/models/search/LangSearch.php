<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 02.02.16
 * Time: 11:31
 */

namespace backend\models\search;


use common\models\Lang;
use yii\data\ActiveDataProvider;

class LangSearch extends Lang
{

    public function rules(){
        return [
            [['name', 'default', 'created_at', 'updated_at'], 'safe'],
        ];
    }

    public function search($params = null)
    {
        $query = self::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['LIKE', 'lang.name', $this->name]);
        $query->andFilterWhere(
            [
                'FROM_UNIXTIME(created_at, "%d.%m.%Y")' => $this->created_at,
                'FROM_UNIXTIME(updated_at, "%d.%m.%Y")' => $this->updated_at
            ]
        );

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