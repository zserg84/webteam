<?php

namespace common\models\query;
use common\models\Lang;

/**
 * This is the ActiveQuery class for [[\common\models\Portfolio]].
 *
 * @see \common\models\Portfolio
 */
class PortfolioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Portfolio[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Portfolio|array|null
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
            'portfolioLangs' => function($query) use($langId){
                $query->where([
                    'portfolio_lang.lang_id' => $langId,
                ]);
            }
        ]);
        return $this;
    }
}