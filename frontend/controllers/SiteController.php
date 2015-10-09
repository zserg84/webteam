<?php
namespace frontend\controllers;

use common\models\Portfolio;
use common\models\Recall;
use common\models\StatementLetter;
use common\models\Team;
use frontend\components\Helper;
use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use yii\base\InvalidParamException;
use yii\bootstrap\ActiveForm;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;

/**
 * Site controller
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['statement'],
                        'allow' => true,
                        'roles' => ['*'],
                    ],
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $this->getView()->registerMetaTag([
            'name' => 'keywords',
            'content' => 'agile проекты, scrum проекты, заказать дорогой сайт, заказать бизнес сайт,
заказать сайт дорого, профессиональное создание сайтов, разработка сложного сайта, создание креативных сайтов,
создание сложных сайтов, создание коммерческого сайта'
        ]);
        $this->getView()->registerMetaTag([
            'name' => 'description',
            'content' => 'Большой опыт сбора команд под большие проекты (от социальных сетей
до успешных интернет-стартапов). С 2001 по 2008 год компания
занималась только крупными интернет-проектами для наших иностранных
партнеров.'
        ]);


        $this->topMenu = Helper::fillFirstPageMenu();
        $recalls = Recall::find()->orderBy('orderby')->all();
        $portfolios = Portfolio::find()->orderBy('orderby')->all();
        $team = Team::find()->orderBy('orderby')->all();
        return $this->render('index', [
            'recalls' => $recalls ? $recalls : [],
            'portfolios' => $portfolios ? $portfolios : [],
            'team' => $team ? $team : [],
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $this->getView()->title = 'Контакты';
        $this->getView()->registerMetaTag([
            'name' => 'keywords',
            'content' => 'офис веб студии, визитка веб студии, поиск веб студий, web студия екатеринбург'
        ]);
        $this->getView()->registerMetaTag([
            'name' => 'description',
            'content' => 'Наши контакты: г. Екатеринбург, ул Красноармейская 76, офис 210. Телефон
для связи: 8 (800) 200-91-88, наш email: info@webteam.pro, skype: yaxonmax
'
        ]);
        return $this->render('contact');
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionStatement(){
        $model = new StatementLetter();
        $post = Yii::$app->getRequest()->post();
        if($model->load($post)){
            $model->page = Yii::$app->request->referrer;
            $model->from = isset($post['hiddenFrom']) ? $post['hiddenFrom'] : '';

            if (\Yii::$app->request->isAjax) {
                \Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }

            if($model->save()){
                \Yii::$app->session->setFlash(
                    'message',
                    'Ваше сообщение отправлено'
                );
                return $this->redirect(\Yii::$app->request->referrer);
            }
        }
        else{
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }
}
