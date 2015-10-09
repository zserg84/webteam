<?php

use yii\db\Migration;

class m150924_055835_work_add extends Migration
{
    public function up()
    {
        $this->delete('work', 'worktype_id=:type', ['type'=>1]);
        $works = [
            'Разработка логотипа' => [
                'Фирменный знак' => 44000,
                'Шрифтовая композиция' => 9900,
                'Фирменные цвета' => 4400,
                'Фирменный фон' => 4400,
                'Ч/б и монохромный вид' => 1100,
                'Альтернативный логотип' => 4400,
                'Правила использования' => 1100,
                'Допустимые размеры' => 1100,
            ],
            'Деловая документация' => [
                'Адресный блок' => 1100,
                'Визитки' => 3300,
                'Бланки' => 2200,
                'Конверты' => 2200,
                'Папка для бумаг' => 2200,
            ],
            'Рекламно-информационная продукция' => [
                'Фирменный паттерн' => 4400,
                'Бейдж' => 2200,
                'Обложка CD-диска' => 2200,
                'Еврофлаер' => 2200,
                'Стикеры для записей' => 2200,
                'Подпись для е-мейла' => 1100,
                'Шаблон презентации' => 2200,
                'Шаблон рекламной полосы' => 2200,
                'Дополнительный элемент(ручка,чашка,футболка и т.п.)' => 2200,
            ],
        ];
        foreach($works as $work=>$subworks){
            $this->insert('work', [
                'worktype_id' => 1,
            ]);
            $lastParent = \common\modules\calculator\models\Work::find()->orderBy('id desc')->one();
            $this->insert('work_lang', [
                'work_id' => $lastParent->id,
                'lang_id' => 2,
                'title' => $work,
            ]);

            foreach($subworks as $subwork=>$cost){
                $this->insert('work', [
                    'worktype_id' => 1,
                    'cost'=>$cost,
                    'parent_id' => $lastParent->id,
                ]);
                $last = \common\modules\calculator\models\Work::find()->orderBy('id desc')->one();
                $this->insert('work_lang', [
                    'work_id' => $last->id,
                    'lang_id' => 2,
                    'title' => $subwork,
                ]);
            }
        }

        $this->insert('work', [
            'worktype_id' => 1,
            'cost' => 22000
        ]);
        $last = \common\modules\calculator\models\Work::find()->orderBy('id desc')->one();
        $this->insert('work_lang', [
            'work_id' => $last->id,
            'lang_id' => 2,
            'title' => 'Оформление фирстиля в виде брендбука',
        ]);
    }

    public function down()
    {
        $this->delete('work', 'worktype_id=:type', ['type'=>1]);
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
