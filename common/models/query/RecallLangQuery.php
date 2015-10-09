<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\RecallLang]].
 *
 * @see \common\models\RecallLang
 */
class RecallLangQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\RecallLang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\RecallLang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}