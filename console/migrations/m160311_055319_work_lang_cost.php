<?php

use yii\db\Migration;

class m160311_055319_work_lang_cost extends Migration
{
    public function up()
    {
        $this->addColumn('work_lang', 'cost', 'float');
        $this->execute('
            update work_lang wl
                inner join work w on w.id = wl.work_id
                set wl.cost = w.cost
                where wl.lang_id = 2
        ');
        $this->dropColumn('work', 'cost');
    }

    public function down()
    {
        $this->dropColumn('work_lang', 'cost');
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
