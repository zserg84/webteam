<?php

use yii\db\Schema;
use yii\db\Migration;

class m150908_081034_recall extends Migration
{
    public function up()
    {
        $this->createTable('image', [
            'id' => $this->primaryKey(),
            'ext' => $this->string(4),
            'comment' => $this->string(),
            'created_at' => $this->integer(),
            'sort' => $this->integer(),
        ]);

        $this->createTable('lang', [
            'id' => $this->primaryKey(),
            'url' => $this->string(5)->notNull(),
            'local' => $this->string(10)->notNull(),
            'name' => $this->string(25)->notNull(),
            'default' => $this->boolean()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->createTable('recall', [
            'id' => $this->primaryKey(),
            'image_id' => $this->integer()
        ]);
        $this->addForeignKey('fk_recall_image_id__image_id', 'recall', 'image_id', 'image', 'id', 'SET NULL', 'CASCADE');

        $this->createTable('recall_lang', [
            'id' => $this->primaryKey(),
            'recall_id' => $this->integer()->notNull(),
            'lang_id' => $this->integer()->notNull(),
            'text' => $this->text()->notNull(),
            'company' => $this->string(),
            'member' => $this->string(),
        ]);
        $this->addForeignKey('fk_recall_lang_recall_id__recall_id', 'recall_lang', 'recall_id', 'recall', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_recall_lang_lang_id__lang_id', 'recall_lang', 'lang_id', 'lang', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('recall_lang');
        $this->dropTable('recall');
        $this->dropTable('image');
        $this->dropTable('lang');
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
