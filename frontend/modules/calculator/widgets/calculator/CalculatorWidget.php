<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 09.11.15
 * Time: 12:08
 */

namespace frontend\modules\calculator\widgets\calculator;

use common\models\StatementLetter;
use yii\bootstrap\Widget;

class CalculatorWidget extends Widget
{
    const TYPE_START = 1;
    const TYPE_2_DESIGN_FIRSTYLE = 2;
    const TYPE_2_MOBILE = 3;
    const TYPE_2_WEBSITE = 4;
    const TYPE_3_CORP_SITE = 5;
    const TYPE_3_DESIGN = 6;
    const TYPE_3_FIRSTYLE = 7;
    const TYPE_3_INTERNET_SERVICE = 8;
    const TYPE_3_INTERNET_STORE = 9;
    const TYPE_3_LANDING = 10;
    const TYPE_3_SOC_NETWORK = 11;
    const TYPE_4_SOC_NETWORK = 12;
    const TYPE_CALCULATION = 13;
    const TYPE_SEND_FORM = 14;
    const TYPE_SEND_EMAIL_FORM = 15;

    const FROM_CALCULATOR_FIRSTYLE = 'firstyle';
    const FROM_CALCULATOR_DESIGN = 'design';
    const FROM_CALCULATOR_LANDING = 'landing';
    const FROM_CALCULATOR_INTERNET_STORE_1S = 'internet_store_1s';
    const FROM_CALCULATOR_INTERNET_STORE_YOURS = 'internet_store_unique';
    const FROM_CALCULATOR_CORP_SITE = 'corp_site';
    const FROM_CALCULATOR_INTERNET_SERVICE = 'internet_service';
    const FROM_CALCULATOR_SOC_NETWORK = 'soc_network';
    const FROM_CALCULATOR_MOBILE = 'mobile';
    const FROM_CALCULATOR_CALCULATION = 'calculation';

    public $type = self::TYPE_START;

    public function init(){
        $this->registerAssets();
    }

    public function registerAssets(){
        $view = $this->getView();
        Asset::register($view);
    }

    public function run(){
        return $this->render('calculator', [
            'type' => $this->type,
        ]);
    }

    public static function getFromArray(){
        return [
            self::FROM_CALCULATOR_FIRSTYLE => 'Фирстиль(скидки)',
            self::FROM_CALCULATOR_DESIGN => 'Дизайн страниц(скидки)',
            self::FROM_CALCULATOR_LANDING => 'Лендинг пейдж(детальный расчет)',
            self::FROM_CALCULATOR_INTERNET_STORE_1S => 'Интернет-магазин на платформе 1С(детальный расчет)',
            self::FROM_CALCULATOR_INTERNET_STORE_YOURS => 'Интернет-магазин - уникальный(детальный расчет)',
            self::FROM_CALCULATOR_CORP_SITE => 'Корпоративный сайт(скидки)',
            self::FROM_CALCULATOR_INTERNET_SERVICE => 'Интернет-сервис(детальный расчет)',
            self::FROM_CALCULATOR_SOC_NETWORK => 'Соц.сеть(детальный расчет)',
            self::FROM_CALCULATOR_MOBILE => 'Мобильное приложение(детальный расчет)',
            self::FROM_CALCULATOR_CALCULATION => 'Самостоятельный расчёт(скидки)',
        ];
    }

    public static function getFromValue($from){
        $arr = self::getFromArray();
        $value = '';
        if(isset($arr[$from]))
            $value = $arr[$from];
        return StatementLetter::getFromValue(StatementLetter::FROM_CALCULATOR) . ($value ? '('.$value.')' : '');
    }
} 