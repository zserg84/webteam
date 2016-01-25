<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 28.12.15
 * Time: 15:32
 */

namespace frontend\modules\calculator\models\form;

use yii\base\Model;

class EmailForm extends Model
{

    public $email;
    public $subworks;

    public function rules(){
        return [
            [['email'], 'required'],
            [['subworks'], 'safe'],
        ];
    }
} 