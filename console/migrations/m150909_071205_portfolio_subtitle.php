<?php

use yii\db\Schema;
use yii\db\Migration;

class m150909_071205_portfolio_subtitle extends Migration
{
    public function up()
    {
        $this->addColumn('portfolio_lang', 'subtitle', $this->string());
    }

    public function down()
    {
        $this->dropColumn('portfolio_lang', 'subtitle');
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
