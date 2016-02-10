<?
echo \frontend\modules\calculator\widgets\emailform\EmailFormWidget::widget([
    'page' => Yii::$app->getRequest()->get('page'),
    'data' => Yii::$app->getRequest()->get('data'),
    'from' => Yii::$app->getRequest()->get('from'),
]);
