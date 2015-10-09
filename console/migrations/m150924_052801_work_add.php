<?php

use yii\db\Migration;

class m150924_052801_work_add extends Migration
{
    public function up()
    {
        $worktypes = [
            3=>'Модуль задания общих цен',
        ];
        foreach($worktypes as $k=>$worktype){
            $this->insert('worktype', [
                'id' => $k+1
            ]);
            $this->insert('worktype_lang', [
                'worktype_id' => $k+1,
                'lang_id' => 2,
                'title' => $worktype
            ]);
        }

        $works = [
            'Лендинг пейдж' => 120000,
            'Интернет магазин на битриксе' => 250000,
            'Интернет магазин кастомный' => 1000000,
            'Социальная сеть' => 3000000,
            'Мобильное приложение' => 250000
        ];
        foreach($works as $work=>$cost){
            $this->insert('work', [
                'worktype_id' => 4,
                'cost' => $cost
            ]);
            $last = \common\modules\calculator\models\Work::find()->orderBy('id desc')->one();
            $this->insert('work_lang', [
                'work_id' => $last->id,
                'lang_id' => 2,
                'title' => $work,
            ]);
        }
    }

    public function down()
    {
        $this->delete('worktype', 'id=:id',['id'=>4]);
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
