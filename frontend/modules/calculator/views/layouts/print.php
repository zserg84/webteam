<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;
use frontend\assets\AppAssetMain;

AppAsset::register($this);
AppAssetMain::register($this);
\frontend\modules\calculator\widgets\calculator\Asset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="shortcut icon" href="<?=Yii::getAlias('@web').'/style/images'; ?>/favicon.ico" type="image/x-icon" />

    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="/frontend/web/style/css/media/m_media-screen.css">
    <![endif]-->

    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="/frontend/web/style/css/all-media_top-bar.css">
    <![endif]-->

    <!-- [IE] -->
    <link rel="stylesheet" type="text/css" href="/frontend/web/style/css/m_ie.css">
    <!--/[IE]/-->
    <!--[if lt IE 9]>
    <link rel="stylesheet" type="text/css" href="/frontend/web/style/css/m_ie8.css">
    <![endif]-->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div>
    <section>
        <?= $content ?>
    </section>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
