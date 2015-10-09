<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 24.09.15
 * Time: 10:42
 */

namespace backend\modules\calculator\models\form;


use common\modules\calculator\models\Worktype;

class WorkCommonForm  extends WorkForm
{
    protected  $worktype_id = Worktype::TYPE_COMMON;
} 