<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 10.09.15
 * Time: 15:23
 */

namespace frontend\controllers;


use common\models\Team;
use frontend\components\Helper;

class TeamController extends Controller
{

    public function init(){
        parent::init();

        $this->getView()->title = Helper::t('team', 'PAGE_TITLE');
        $this->getView()->registerMetaTag([
            'name' => 'keywords',
            'content' => Helper::t('team', 'PAGE_KEYWORDS')
        ]);
        $this->getView()->registerMetaTag([
            'name' => 'description',
            'content' => Helper::t('team', 'PAGE_DESCRIPTION')
        ]);
    }

    public function actionIndex(){
        $team = Team::find()->orderBy('orderby')->all();
        return $this->render('index', [
            'team' => $team,
        ]);
    }
} 