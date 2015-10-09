<?php

use yii\db\Schema;
use yii\db\Migration;

class m150914_094715_orderby extends Migration
{
    public function up()
    {
        $this->addColumn('portfolio', 'orderby', $this->integer());
        $this->addColumn('team', 'orderby', $this->integer());
        $this->addColumn('recall', 'orderby', $this->integer());
    }

    public function down()
    {
        $this->dropColumn('portfolio', 'orderby');
        $this->dropColumn('team', 'orderby');
        $this->dropColumn('recall', 'orderby');
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
