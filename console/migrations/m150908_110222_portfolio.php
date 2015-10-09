<?php

use yii\db\Schema;
use yii\db\Migration;

class m150908_110222_portfolio extends Migration
{
    public function up()
    {
        $this->createTable('portfolio', [
            'id' => $this->primaryKey()
        ]);

        $this->createTable('portfolio_lang', [
            'id' => $this->primaryKey(),
            'portfolio_id' => $this->integer()->notNull(),
            'lang_id' => $this->integer()->notNull(),
            'title' => $this->string(64),
            'description' => $this->text(),
        ]);
        $this->addForeignKey('fk_portfolio_lang_portfolio_id__portfolio_id', 'portfolio_lang', 'portfolio_id', 'portfolio', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_portfolio_lang_lang_id__lang_id', 'portfolio_lang', 'lang_id', 'lang', 'id', 'CASCADE', 'CASCADE');

        $this->createTable('portfolio_image', [
            'id' => $this->primaryKey(),
            'portfolio_id' => $this->integer()->notNull(),
            'image_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_portfolio_image_portfolio_id__portfolio_id', 'portfolio_image', 'portfolio_id', 'portfolio', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_portfolio_image_image_id__image_id', 'portfolio_image', 'image_id', 'image', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('portfolio_image');
        $this->dropTable('portfolio_lang');
        $this->dropTable('portfolio');
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
