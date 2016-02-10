<?php

use yii\db\Migration;

class m160204_071149_vacancies_lang extends Migration
{
    public function up()
    {
        $this->createTable('vacancy_lang', [
            'id' => $this->primaryKey(),
            'vacancy_id' => $this->integer()->notNull(),
            'lang_id' => $this->integer()->notNull(),
            'title' => $this->string(50)->notNull(),
            'description' => $this->text()
        ]);
        $this->addForeignKey('fk_vacancy_lang_vacancy_id__vacancy_id', 'vacancy_lang', 'vacancy_id', 'vacancy', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_vacancy_lang_lang_id__lang_id', 'vacancy_lang', 'lang_id', 'lang', 'id', 'CASCADE', 'CASCADE');

        $this->execute('
            insert into vacancy_lang(vacancy_id, lang_id, title, description)
              select id as vacancy_id, 2 as lang_id, title, description
                from vacancy;
        ');
    }

    public function down()
    {
        $this->dropTable('vacancy_lang');
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
