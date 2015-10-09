<?php

namespace common\modules\calculator\models\query;
use common\models\Lang;

/**
 * This is the ActiveQuery class for [[\common\modules\calculator\models\Worktype]].
 *
 * @see \common\modules\calculator\models\Worktype
 */
class WorktypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\modules\calculator\models\Worktype[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\modules\calculator\models\Worktype|array|null
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
            'worktypeLangs' => function($query) use($langId){
                $query->where([
                    'worktype_lang.lang_id' => $langId,
                ]);
            }
        ]);
        return $this;
    }
}