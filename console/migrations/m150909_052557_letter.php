<?php

use yii\db\Schema;
use yii\db\Migration;

class m150909_052557_letter extends Migration
{
    public function up()
    {
        $this->createTable('statement_interest', [
            'id' => $this->primaryKey(),
            'name' => $this->string(64)->notNull()
        ]);

        $interests = [
            'Заказать проект',
            'Работать у нас',
            'Познакомиться',
        ];
        foreach($interests as $interest){
            $this->insert('statement_interest', [
                'name' => $interest
            ]);
        }

        $this->createTable('statement_letter', [
            'id' => $this->primaryKey(),
            'fio' => $this->string()->notNull(),
            'email' => $this->string(64)->notNull(),
            'phone' => $this->string(64),
            'interest_id' => $this->integer(),
            'text' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'sent_at' => $this->integer(),
            'page' => $this->string()
        ]);
        $this->addForeignKey('fk_letter_interest_id__interest_id', 'statement_letter', 'interest_id', 'statement_interest', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('statement_letter');
        $this->dropTable('statement_interest');
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
