<?php

namespace common\modules\calculator\models\query;
use common\models\Lang;

/**
 * This is the ActiveQuery class for [[\common\modules\calculator\models\WorkLang]].
 *
 * @see \common\modules\calculator\models\WorkLang
 */
class WorkLangQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\modules\calculator\models\WorkLang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\modules\calculator\models\WorkLang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function getCost($alias){
        $this->innerJoinWith([
            'work' => function($query) use ($alias){
                $query->andWhere([
                    'work.alias' => $alias,
                ]);
            }
        ])->andWhere([
            'work_lang.lang_id' => Lang::getCurrent()->id
        ]);
        return $this;
    }
}