<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 23.09.15
 * Time: 10:27
 */

namespace backend\modules\calculator\models\search;


use backend\modules\calculator\models\Work;
use common\modules\calculator\models\WorkLang;
use yii\data\ActiveDataProvider;
use yii\data\ArrayDataProvider;
use yii\helpers\VarDumper;

class WorkSearch extends Work
{
    protected $_children;
    public $worktypeId;
    private $_costRu;
    private $_costEn;

    public function rules(){
        return [
            [['title', 'costRu', 'costEn', 'worktype_id', 'parent_id'], 'safe'],
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

        if($this->_costRu){
            $query->andFilterWhere(['=', 'work_lang.cost', $this->_costRu])->andWhere([
                'work_lang.lang_id'=> 2
            ]);
        }
        if($this->_costEn){
            $query->andFilterWhere(['=', 'work_lang.cost', $this->_costEn])->andWhere([
                'work_lang.lang_id' => 1
            ]);
        }


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

    public function getCostRu(){
        if($this->_costRu)
            return $this->_costRu;
        $wl = WorkLang::findOne([
            'lang_id' => 2,
            'work_id' => $this->id
        ]);
        return $wl ? $wl->cost : null;
    }
    public function setCostRu($value){
        $this->_costRu = $value;
    }

    public function getCostEn(){
        if($this->_costEn)
            return $this->_costEn;
        $wl = WorkLang::findOne([
            'lang_id' => 1,
            'work_id' => $this->id
        ]);
        return $wl ? $wl->cost : null;
    }
    public function setCostEn($value){
        $this->_costEn = $value;
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