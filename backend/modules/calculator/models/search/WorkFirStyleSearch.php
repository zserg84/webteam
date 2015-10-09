<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 23.09.15
 * Time: 10:48
 */

namespace backend\modules\calculator\models\search;


use common\modules\calculator\models\Worktype;

class WorkFirStyleSearch extends WorkSearch
{
    public $worktypeId = Worktype::TYPE_FIRSTYLE;
} 