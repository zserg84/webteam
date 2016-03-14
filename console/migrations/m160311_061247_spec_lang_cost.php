<?php

use yii\db\Migration;

class m160311_061247_spec_lang_cost extends Migration
{
    public function up()
    {
        $this->addColumn('specialist_lang', 'salary', 'float');
        $this->addColumn('specialist_lang', 'amortization', 'float');
        $this->addColumn('specialist_lang', 'maintenance', 'float');
        $this->execute('
            update specialist_lang sl
                inner join specialist s on s.id = sl.specialist_id
                set sl.salary = s.salary,
                sl.amortization = s.amortization,
                sl.maintenance = s.maintenance
                where sl.lang_id = 2
        ');
        $this->dropColumn('specialist', 'salary');
        $this->dropColumn('specialist', 'amortization');
        $this->dropColumn('specialist', 'maintenance');
    }

    public function down()
    {
        $this->dropColumn('specialist_lang', 'salary');
        $this->dropColumn('specialist_lang', 'amortization');
        $this->dropColumn('specialist_lang', 'maintenance');
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
