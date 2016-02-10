<?php

namespace common\models\query;
use common\models\Lang;

/**
 * This is the ActiveQuery class for [[\common\models\Vacancy]].
 *
 * @see \common\models\Vacancy
 */
class VacancyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Vacancy[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Vacancy|array|null
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
            'vacancyLangs' => function($query) use($langId){
                $query->where([
                    'vacancy_lang.lang_id' => $langId,
                ]);
            }
        ]);
        return $this;
    }
}