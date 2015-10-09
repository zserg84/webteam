<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 23.09.15
 * Time: 13:00
 */

namespace backend\modules\calculator\models\form;


use common\modules\calculator\models\Worktype;

class WorkSiteForm extends WorkForm
{
    protected  $worktype_id = Worktype::TYPE_SITE;

} 