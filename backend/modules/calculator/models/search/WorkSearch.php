<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 23.09.15
 * Time: 10:27
 */

namespace backend\modules\calculator\models\search;


use backend\modules\calculator\models\Work;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\helpers\VarDumper;

class WorkSearch extends Work
{
    protected $_children;
    public $worktypeId;

    public function rules(){
        return [
            [['title', 'cost', 'worktype_id', 'parent_id'], 'safe'],
        ];
    }

    public function search($params = null)
    {
        $worktypeId = $this->worktypeId;

        $query = self::find();
//        $dataProvider = new ActiveDataProvider([
//            'query' => $query,
//        ]);

        $query->lang();

        /*$dataProvider->setSort([
            'defaultOrder' => ['title'=>SORT_ASC],
            'attributes' => [
                'title' => [
                    'asc' => ['work_lang.title' => SORT_ASC],
                    'desc' => ['work_lang.title' => SORT_DESC],
                ],
                'cost', 'worktype_id'
            ],
        ]);*/

        $query->orderBy(['parent_id' => 'ASC', 'id' => 'ASC']);

        $query->where(['work.worktype_id'=> $worktypeId]);

        $this->load($params);
//        if (!($this->load($params) && $this->validate())) {
//            return $dataProvider;
//        }

        $query->andFilterWhere(['=', 'work.parent_id', $this->parent_id])->orFilterWhere(['=', 'work.id', $this->parent_id]);
        $query->andFilterWhere(['=', 'work.worktype_id', $this->worktype_id]);
        $query->andFilterWhere(['LIKE', 'work_lang.title', $this->title]);
        $query->andFilterWhere(['=', 'work.cost', $this->cost]);

        $models = $query->all();
        $array = [];
        if ($models !== null) {
            $models = self::buildTree($models);
            foreach($models as $model){
                $array[] = $model;
                if($model->children){
                    foreach($model->children as $children){
                        $array[] = $children;
                    }
                }
            }
        }

        $dataProvider = new ArrayDataProvider([
            'allModels' => $array,
            'key' => function ($model) {
                return ['id' => $model->id];
            },
        ]);

        return $dataProvider;
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
                'title' => 'Название',
            ]
        );
    }

    protected static function buildTree(&$data, $parentID = null)
    {
        $tree = [];

        foreach ($data as $id => $node) {
            if ($node->parent_id == $parentID) {
                unset($data[$id]);
                $node->children = self::buildTree($data, $node->id);
                $tree[] = $node;
            }
        }

        return $tree;
    }

    /**
     * $_children getter.
     *
     * @return null|array|]yii\db\ActiveRecord[] Comment children
     */
    public function getChildren()
    {
        return $this->_children;
    }

    /**
     * $_children setter.
     *
     * @param array|\yii\db\ActiveRecord[] $value Comment children
     */
    public function setChildren($value)
    {
        $this->_children = $value;
    }
} 