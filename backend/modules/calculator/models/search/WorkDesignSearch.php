<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 23.09.15
 * Time: 12:59
 */

namespace backend\modules\calculator\models\search;


use common\modules\calculator\models\Worktype;

class WorkDesignSearch extends WorkSearch
{

    public $worktypeId = Worktype::TYPE_DESIGN;

} 