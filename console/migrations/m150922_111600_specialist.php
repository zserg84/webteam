<?php

use yii\db\Schema;
use yii\db\Migration;

class m150922_111600_specialist extends Migration
{
    public function up()
    {
        $this->createTable('specialist', [
            'id' => $this->primaryKey(),
            'visible' => $this->boolean()->defaultValue(1),
            'salary' => $this->float(),
            'tax' => $this->float(),
            'amortization' => $this->float(),
            'maintenance' => $this->float(),
            'profit' => $this->float(),
            'usn' => $this->float(),
        ]);
        $this->createTable('specialist_lang', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull(),
            'specialist_id' => $this->integer()->notNull(),
            'lang_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_specialist_lang_specialist_id__specialist_id', 'specialist_lang', 'specialist_id', 'specialist', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_specialist_lang_lang_id__lang_id', 'specialist_lang', 'lang_id', 'lang', 'id', 'CASCADE', 'CASCADE');
        $this->createIndex('uidx_specialist_lang_specialist_id_lang_id', 'specialist_lang', 'specialist_id, lang_id', true);
    }

    public function down()
    {
        $this->dropTable('specialist_lang');
        $this->dropTable('specialist');
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
