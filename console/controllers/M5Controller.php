<?php
/**
 * Created by PhpStorm.
 * User: sz
 * Date: 09.09.15
 * Time: 10:44
 */

namespace console\controllers;

use common\models\StatementLetter;
use yii\console\Controller;
use yii\helpers\VarDumper;

class M5Controller extends Controller
{

    public function actionIndex(){
        $this->_sendStatementLetter();
    }

    private  function _sendStatementLetter(){
        $mailer = \Yii::$app->get('mailer');

        $letters = StatementLetter::find()->where(['sent_at' => null])->all();
        foreach($letters as $letter){
            /*$message = $mailer->compose(['html' => '@common/mail/statement/statement-html'], [
                'letter' => $letter
            ])
                ->setFrom([$letter->email => $letter->fio])
                ->setTo(\Yii::$app->params['supportEmail'])
                ->setBcc(\Yii::$app->params['adminEmail'])
                ->setSubject('Заявка от ' . $letter->fio . '(' . $letter->email . ')');
            $logger = new \Swift_Plugins_Loggers_ArrayLogger();
            $mailer->getSwiftMailer()->registerPlugin(new \Swift_Plugins_LoggerPlugin($logger));
            if ($message->send()) {
                $letter->sent_at = time();
                $letter->save();
            }
            else{
                echo $logger->dump();
            }*/

            $message = '
                <html>
                <head>
                    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
                    <meta http-equiv="content-language" content="ru">
                    <meta http-equiv="pragma" content="no-cache">
                    <meta http-equiv="cache-control" content="no-cache">

                    <title></title>
                </head>
                <body>
                <div>
                    <strong>Откуда: </strong>
                    <span>'.$letter->from.'</span>
                </div>
                <div>
                    <strong>От: </strong>
                    <span>'.$letter->fio.'</span>
                </div>
                <div>
                    <strong>E-mail: </strong>
                    <span>'.$letter->email.'</span>
                </div>
                <div>
                    <strong>Телефон: </strong>
                    <span>'.$letter->phone.'</span>
                </div>';

            if($letter->statementInterest){
                $message .= '<div>
                    <strong>Что интересует: </strong>
                    <span>'.$letter->statementInterest->name.'</span>
                </div>';
            }
            $message.= '<div>
                <strong>Сообщение: </strong>
                <span>'.$letter->text.'</span>
            </div>';

            $message .= '
                </body></html>
            ';

            $from = "info@webteam.pro";
            $to = \Yii::$app->params['supportEmail'];
            $adminEmail = \Yii::$app->params['adminEmail'];
            if(is_array($adminEmail)){
                $adminEmail = implode(',', $adminEmail);
            }
            $subject = 'Заявка от ' . $letter->fio . '(' . $letter->email . ')';
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            $headers .= "From:" . $from . "\r\n";

            if($adminEmail){
                $headers .= "Bcc: ". $adminEmail . "\r\n";
            }
            if(mail($to,$subject,$message, $headers)){
                $letter->sent_at = time();
                $letter->save(false);
            }
            else{
                VarDumper::dump('error');
            }

        }


    }
} 