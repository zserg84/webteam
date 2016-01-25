<?php

namespace common\modules\calculator\models\query;
use common\models\Lang;

/**
 * This is the ActiveQuery class for [[\common\modules\calculator\models\Specialist]].
 *
 * @see \common\modules\calculator\models\Specialist
 */
class SpecialistQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\modules\calculator\models\Specialist[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\modules\calculator\models\Specialist|array|null
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
            'specialistLangs' => function($query) use($langId){
                $query->where([
                    'specialist_lang.lang_id' => $langId,
                ]);
            }
        ]);
        return $this;
    }
//20.7 + 3.2+ 80 + 2 + 7 = 112.9
    public function visible(){
        $this->andWhere([
            'visible' => 1
        ]);
        return $this;
    }
}