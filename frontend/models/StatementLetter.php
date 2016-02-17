<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 15.02.16
 * Time: 13:45
 */

namespace frontend\models;


use frontend\components\Helper;

class StatementLetter extends \common\models\StatementLetter
{

    public function attributeLabels(){
        return array_merge(parent::attributeLabels(), [
            'email' => Helper::t('flyform', 'FORM_EMAIL'),
            'phone' => Helper::t('flyform', 'FORM_PHONE'),
            'interest_id' => Helper::t('flyform', 'FORM_SELECT'),
        ]);
    }
} 