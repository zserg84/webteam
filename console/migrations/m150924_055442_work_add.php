<?php

use yii\db\Migration;

class m150924_055442_work_add extends Migration
{
    public function up()
    {
        $works = [
            'Главная (домашняя) страница сайта' => 40000,
            'Внутренняя страница сайта (простая) ' => 2000,
            'Внутренняя страница сайта (сложная) ' => 4000,
            'Подготовка Styleguide для сайта (пример) ' => 12000,
        ];
        foreach($works as $work=>$cost){
            $this->insert('work', [
                'worktype_id' => 2,
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
        $this->delete('work', 'worktype_id=:type', ['type'=>2]);
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
