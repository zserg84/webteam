<?php

use yii\db\Migration;

class m150924_061602_interest_add extends Migration
{
    public function up()
    {
        $this->insert('statement_interest', [
            'id'=>4,
            'name' => 'Узнать цену'
        ]);
    }

    public function down()
    {
        $this->delete('statement_interest', [
            'id' => 4
        ]);
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
