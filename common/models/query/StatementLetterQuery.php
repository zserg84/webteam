<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\StatementLetter]].
 *
 * @see \common\models\StatementLetter
 */
class StatementLetterQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\StatementLetter[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\StatementLetter|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}