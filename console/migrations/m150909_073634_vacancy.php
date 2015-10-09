<?php

use yii\db\Schema;
use yii\db\Migration;

class m150909_073634_vacancy extends Migration
{
    public function up()
    {
        $this->createTable('vacancy', [
            'id' => $this->primaryKey(),
            'title' => $this->string(64)->notNull(),
            'description' => $this->text(),
            'image_id' => $this->integer()
        ]);
        $this->addForeignKey('fk_vacancy_image_id__image_id', 'vacancy', 'image_id', 'image', 'id', 'SET NULL', 'CASCADE');

        $vacancies = ['Руководитель проектов', 'Аналитик' , 'Проектировщик интерфейсов', 'Php программист', 'Front-end разработчик' , 'Html-верстальщик',
            'Android разработчик для мобильных приложений', 'IOS разработчик для мобильных приложений' , 'Тестировщик сайтов и приложений'];
        foreach($vacancies as $v){
            $this->insert('vacancy', [
                'title' => $v
            ]);
        }
    }

    public function down()
    {
        $this->dropTable('vacancy');
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
