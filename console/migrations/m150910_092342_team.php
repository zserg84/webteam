<?php

use yii\db\Schema;
use yii\db\Migration;

class m150910_092342_team extends Migration
{
    public function up()
    {
        $this->createTable('team', [
            'id' => $this->primaryKey(),
            'black_image_id' => $this->integer(),
            'color_image_id' => $this->integer()
        ]);

        $this->addForeignKey('fk_team_balck_image_id__image_id', 'team', 'black_image_id', 'image', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk_team_color_image_id__image_id', 'team', 'color_image_id', 'image', 'id', 'SET NULL', 'CASCADE');

        $this->createTable('team_lang', [
            'id' => $this->primaryKey(),
            'team_id' => $this->integer()->notNull(),
            'lang_id' => $this->integer()->notNull(),
            'name' => $this->string(64),
            'surname' => $this->string(64)->notNull(),
            'position' => $this->string(64),
            'description' => $this->text(),
        ]);
        $this->addForeignKey('fk_team_lang_team_id__team_id', 'team_lang', 'team_id', 'team', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_team_lang_lang_id__lang_id', 'team_lang', 'lang_id', 'lang', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('team_lang');
        $this->dropTable('team');
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
