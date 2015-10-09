<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 23.09.15
 * Time: 11:04
 */

namespace backend\modules\calculator\models\form;


use common\modules\calculator\models\Worktype;

class WorkFirStyleForm extends WorkForm
{
    protected  $worktype_id = Worktype::TYPE_FIRSTYLE;
} 