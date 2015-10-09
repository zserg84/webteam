<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 23.09.15
 * Time: 13:01
 */

namespace backend\modules\calculator\models\search;


use common\modules\calculator\models\Worktype;

class WorkSiteSearch extends WorkSearch
{
    public $worktypeId = Worktype::TYPE_SITE;
} 