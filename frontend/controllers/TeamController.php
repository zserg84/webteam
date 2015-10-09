<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 10.09.15
 * Time: 15:23
 */

namespace frontend\controllers;


use common\models\Team;

class TeamController extends Controller
{

    public function init(){
        parent::init();

        $this->getView()->title = 'Команда разработчиков';
        $this->getView()->registerMetaTag([
            'name' => 'keywords',
            'content' => 'agile команда, scrum команда, команда для стартапа, команда веб-разработчиков,
команда на интернет-проект, команда разработчиков, команда разработчиков на проект,
команда разработчиков программного обеспечения, команда веб разработчиков, команда разработчиков сайтов'
        ]);
        $this->getView()->registerMetaTag([
            'name' => 'description',
            'content' => 'Команда квалифицированных специалистов, обеспечит качественное
и оперативное выполнение работ. Создаем сайты любой сложности, обеспечим
продвижение в социальных сетях.
'
        ]);
    }

    public function actionIndex(){
        $team = Team::find()->orderBy('orderby')->all();
        return $this->render('index', [
            'team' => $team,
        ]);
    }
} 