<?php

use yii\db\Migration;

class m150922_125353_work extends Migration
{
    public function up()
    {
        $this->createTable('worktype', [
            'id' => $this->primaryKey()
        ]);
        $this->createTable('worktype_lang', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'worktype_id' => $this->integer()->notNull(),
            'lang_id'  => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_worktype_lang_worktype_id__worktype_id', 'worktype_lang', 'worktype_id', 'worktype', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_worktype_lang_lang_id__lang_id', 'worktype_lang', 'lang_id', 'lang', 'id', 'CASCADE', 'CASCADE');
        $this->createIndex('uidx_worktype_lang_worktype_id_lang_id', 'worktype_lang', 'worktype_id, lang_id', true);

        $this->createTable('work', [
            'id' => $this->primaryKey(),
            'worktype_id' => $this->integer()->notNull(),
            'parent_id' => $this->integer()->defaultValue(null),
            'cost' => $this->float()->defaultValue(0)
        ]);

        $this->addForeignKey('fk_work_worktype_id__worktype_id', 'work', 'worktype_id', 'worktype', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_work_parent_id__work_id', 'work', 'parent_id', 'work', 'id', 'CASCADE', 'CASCADE');

        $this->createTable('work_lang', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'work_id' => $this->integer()->notNull(),
            'lang_id'  => $this->integer()->notNull(),
        ]);
        $this->addForeignKey('fk_work_lang_work_id__work_id', 'work_lang', 'work_id', 'work', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_work_lang_lang_id__lang_id', 'work_lang', 'lang_id', 'lang', 'id', 'CASCADE', 'CASCADE');
        $this->createIndex('uidx_work_lang_work_id_lang_id', 'work_lang', 'work_id, lang_id', true);

        $worktypes = [
            'Расчет стоимости создания фирменного стиля',
            'Расчет стоимости дизайна страниц',
            'Расчет стоимости корпоративного сайта',
        ];
        foreach($worktypes as $k=>$worktype){
            $this->insert('worktype', [
                'id' => $k+1
            ]);
            $this->insert('worktype_lang', [
                'worktype_id' => $k+1,
                'lang_id' => 2,
                'title' => $worktype
            ]);
        }
    }

    public function down()
    {
        $this->dropTable('work_lang');
        $this->dropTable('work');
        $this->dropTable('worktype_lang');
        $this->dropTable('worktype');
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
