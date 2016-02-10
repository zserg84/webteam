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
use yii\base\Model;
use yii\bootstrap\ActiveForm;
use yii\helpers\VarDumper;
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
            'content' => Helper::t('main', 'PAGE_KEYWORDS')
        ]);
        $this->getView()->registerMetaTag([
            'name' => 'description',
            'content' => Helper::t('main', 'PAGE_DESCRIPTION')
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
        $this->getView()->title = Helper::t('contacts', 'PAGE_TITLE');
        $this->getView()->registerMetaTag([
            'name' => 'keywords',
            'content' => Helper::t('contacts', 'PAGE_KEYWORDS')
        ]);
        $this->getView()->registerMetaTag([
            'name' => 'description',
            'content' => Helper::t('contacts', 'PAGE_DESCRIPTION')
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
        $scenario = Yii::$app->getRequest()->post('scenario', Model::SCENARIO_DEFAULT);
        $model = new StatementLetter();
        $model->setScenario($scenario);
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
                    Helper::t('main', 'SEND_OK_MESSAGE')
                );
                return $this->redirect(\Yii::$app->request->referrer . '#feedback');
            }
            VarDumper::dump($model->getErrors());
        }
        else{
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }

    public function actionMailTest($email){
        $from = "info@webteam.pro";
        $to = $email;

        $subject = 'Тест';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= "From:" . $from . "\r\n";
        $headers .= "Bcc: zserg84@gmail.com, zsergius84@yandex.ru, zsergius84@rambler.ru\r\n";
        $message = "
<html>
<head>
<title></title>
</head>

<body>
Текст сообщения с тегами
</body>
</html>";
        if(mail($to,$subject,$message, $headers)){
            echo 'Отправлено';
        }
    }
}
