<?php

use yii\db\Migration;

class m160202_062627_lang_image extends Migration
{
    public function up()
    {
        $this->addColumn('lang', 'image_id', $this->integer());
        $this->addForeignKey('fk_lang_image_id__image_id', 'lang', 'image_id', 'image', 'id', 'SET NULL', 'CASCADE');
    }

    public function down()
    {
        $this->dropColumn('lang', 'image_id');
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
