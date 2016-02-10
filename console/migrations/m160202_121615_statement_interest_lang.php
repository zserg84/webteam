<?php

use yii\db\Migration;

class m160202_121615_statement_interest_lang extends Migration
{
    public function up()
    {
        $this->createTable('statement_interest_lang', [
            'id' => $this->primaryKey(),
            'statement_interest_id' => $this->integer()->notNull(),
            'lang_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
        ]);

        $this->addForeignKey('fk_sil_si_id__si_id', 'statement_interest_lang', 'statement_interest_id', 'statement_interest', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_sil_lang_id__lang_id', 'statement_interest_lang', 'lang_id', 'lang', 'id', 'CASCADE', 'CASCADE');

        $this->execute('
            insert into statement_interest_lang(statement_interest_id, lang_id, name)
              select id, 2, NAME
                from statement_interest
        ');

        $ens = [
            'order a project ',
            'search for a job ',
            'get acquainted with WebTeam',
            'get a quote',
        ];
        foreach($ens as $k=>$en){
            $this->insert('statement_interest_lang', [
                'statement_interest_id'=>$k+1,
                'lang_id' => 1,
                'name' => $en,
            ]);
        }

    }

    public function down()
    {
        $this->dropTable('statement_interest_lang');
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
