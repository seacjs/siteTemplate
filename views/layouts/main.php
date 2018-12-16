<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\PhoneAsset;

AppAsset::register($this);
// PhoneAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>

    <!-- Fonts -->
<!--    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic" rel="stylesheet">-->
<!--    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&amp;subset=cyrillic" rel="stylesheet">-->
<!--    <link href="https://fonts.googleapis.com/css?family=PT+Sans|PT+Sans+Caption|PT+Sans+Narrow|PT+Serif|Ubuntu" rel="stylesheet">-->
<!--    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i" rel="stylesheet">

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>

<?= $this->render('@app/views/layouts/block/header', [
]); ?>

<?php if((Yii::$app->controller->id == 'site') && (Yii::$app->controller->action->id == 'index')):?>
<?php else: ?>
     <div class="container hide">
         <div class="breadcrumb-before"></div>
         <?= Breadcrumbs::widget([
             'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
             'homeLink' => [
                 'label' => 'Главная',
                 'url' => '/',
                 ''
             ]
         ]) ?>

         <div class="breadcrumb-after"></div>
     </div>
 <?php endif ?>

<?= $content ?>

<?= $this->render('@app/views/layouts/block/footer', [
]); ?>


<?php $this->endBody() ?>


</body>
</html>
<?php $this->endPage() ?>
