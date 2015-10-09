<?php

namespace common\modules\calculator\models\query;

/**
 * This is the ActiveQuery class for [[\common\modules\calculator\models\WorktypeLang]].
 *
 * @see \common\modules\calculator\models\WorktypeLang
 */
class WorktypeLangQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\modules\calculator\models\WorktypeLang[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\modules\calculator\models\WorktypeLang|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}