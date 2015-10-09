<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 24.09.15
 * Time: 10:41
 */

namespace backend\modules\calculator\models\search;


use common\modules\calculator\models\Worktype;

class WorkCommonSearch extends WorkSearch
{
    public $worktypeId = Worktype::TYPE_COMMON;
} 