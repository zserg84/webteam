<?php

use yii\db\Schema;
use yii\db\Migration;

class m150911_121454_statement_add extends Migration
{
    public function up()
    {
        $this->addColumn('statement_letter', 'from', $this->string());
    }

    public function down()
    {
        $this->dropColumn('statement_letter', 'from');
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
