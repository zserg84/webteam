<?php

namespace common\modules\calculator\models\query;
use common\models\Lang;

/**
 * This is the ActiveQuery class for [[\common\modules\calculator\models\Work]].
 *
 * @see \common\modules\calculator\models\Work
 */
class WorkQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\modules\calculator\models\Work[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\modules\calculator\models\Work|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function parents(){
        return $this->andWhere(['parent_id'=>null]);
    }

    public function lang($langId = null){
        if(!$langId){
            $lang = Lang::getCurrent();
            $langId = $lang->id;
        }
        $this->innerJoinWith([
            'workLangs' => function($query) use($langId){
                $query->where([
                    'work_lang.lang_id' => $langId,
                ]);
            }
        ]);
        return $this;
    }
}