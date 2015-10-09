<?php

namespace common\models\query;
use common\models\Lang;

/**
 * This is the ActiveQuery class for [[\common\models\Team]].
 *
 * @see \common\models\Team
 */
class TeamQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Team[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Team|array|null
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
            'teamLangs' => function($query) use($langId){
                $query->where([
                    'team_lang.lang_id' => $langId,
                ]);
            }
        ]);
        return $this;
    }
}