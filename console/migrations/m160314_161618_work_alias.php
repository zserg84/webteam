<?php

use yii\db\Migration;

class m160314_161618_work_alias extends Migration
{
    public function up()
    {
        $this->addColumn('work', 'alias', $this->string(32));
        $this->execute('
            update work w
                inner join work_lang wl on wl.work_id = w.id
            set w.alias = "landing"
            where wl.lang_id = 2
              and wl.title = "Лендинг пейдж"
        ');
        $this->execute('
            update work w
                inner join work_lang wl on wl.work_id = w.id
            set w.alias = "internet_store_bitrix"
            where wl.lang_id = 2
              and wl.title = "Интернет магазин на битриксе"
        ');
        $this->execute('
            update work w
                inner join work_lang wl on wl.work_id = w.id
            set w.alias = "internet_store_custom"
            where wl.lang_id = 2
              and wl.title = "Интернет магазин кастомный"
        ');
        $this->execute('
            update work w
                inner join work_lang wl on wl.work_id = w.id
            set w.alias = "soc_network"
            where wl.lang_id = 2
              and wl.title = "Социальная сеть"
        ');
        $this->execute('
            update work w
                inner join work_lang wl on wl.work_id = w.id
            set w.alias = "mobile"
            where wl.lang_id = 2
              and wl.title = "Мобильное приложение"
        ');
    }

    public function down()
    {
        $this->dropColumn('work', 'alias');
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
