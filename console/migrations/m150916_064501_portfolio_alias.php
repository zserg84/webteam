<?php

use yii\db\Schema;
use yii\db\Migration;

class m150916_064501_portfolio_alias extends Migration
{
    public function up()
    {
        $this->delete('portfolio');
        $this->addColumn('portfolio', 'alias', $this->string());
        $this->createIndex('uidx_portfolio_alias' , 'portfolio', 'alias', true);
    }

    public function down()
    {
        $this->dropColumn('portfolio', 'alias');
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
