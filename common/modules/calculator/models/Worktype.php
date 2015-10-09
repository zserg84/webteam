<?php

namespace common\modules\calculator\models;

use Yii;

/**
 * This is the model class for table "worktype".
 *
 * @property integer $id
 *
 * @property WorktypeLang[] $worktypeLangs
 */
class Worktype extends \yii\db\ActiveRecord
{
    const TYPE_FIRSTYLE = 1;
    const TYPE_DESIGN = 2;
    const TYPE_SITE = 3;
    const TYPE_COMMON = 4;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'worktype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorktypeLangs()
    {
        return $this->hasMany(WorktypeLang::className(), ['worktype_id' => 'id'])->indexBy('lang_id');
    }

    /**
     * @inheritdoc
     * @return \common\modules\calculator\models\query\WorktypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\modules\calculator\models\query\WorktypeQuery(get_called_class());
    }
}
