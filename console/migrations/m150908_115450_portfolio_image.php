<?php

use yii\db\Schema;
use yii\db\Migration;

class m150908_115450_portfolio_image extends Migration
{
    public function up()
    {
        $this->addColumn('portfolio', 'image_id', $this->integer());
        $this->addForeignKey('fk_portfolio_image_id__image_id', 'portfolio', 'image_id', 'image', 'id', 'SET NULL', 'CASCADE');
    }

    public function down()
    {
        $this->dropColumn('portfolio', 'image_id');
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
