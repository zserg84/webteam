<?php

namespace common\models\query;
use common\models\Lang;

/**
 * This is the ActiveQuery class for [[\common\models\Recall]].
 *
 * @see \common\models\Recall
 */
class RecallQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Recall[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Recall|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function lang($langId = null){
        if(!$langId){
            $lang = Lang::getCurrent();
            $langId = $lang->id;
        }
        $this->innerJoinWith([
            'recallLangs' => function($query) use($langId){
                $query->where([
                    'recall_lang.lang_id' => $langId,
                ]);
            }
        ]);
        return $this;
    }
}