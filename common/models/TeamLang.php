<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "team_lang".
 *
 * @property integer $id
 * @property integer $team_id
 * @property integer $lang_id
 * @property string $name
 * @property string $surname
 * @property string $position
 * @property string $description
 *
 * @property Lang $lang
 * @property Team $team
 */
class TeamLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['team_id', 'lang_id'], 'required'],
            [['team_id', 'lang_id'], 'integer'],
            [['description'], 'string'],
            [['name', 'surname', 'position'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'team_id' => 'Team ID',
            'lang_id' => 'Lang ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'position' => 'Position',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeam()
    {
        return $this->hasOne(Team::className(), ['id' => 'team_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\TeamLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\TeamLangQuery(get_called_class());
    }
}
