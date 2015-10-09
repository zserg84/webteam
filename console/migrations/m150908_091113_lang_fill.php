<?php

use yii\db\Schema;
use yii\db\Migration;

class m150908_091113_lang_fill extends Migration
{
    public function up()
    {
        $this->insert('lang', [
            'url' => 'en',
            'local' => 'en-US',
            'name' => 'English',
            'default' => 0
        ]);

        $this->insert('lang', [
            'url' => 'ru',
            'local' => 'ru-RU',
            'name' => 'Русский',
            'default' => 1
        ]);
    }

    public function down()
    {
        $this->delete('lang', 'url=:url', ['url'=>'en']);
        $this->delete('lang', 'url=:url', ['url'=>'ru']);
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
