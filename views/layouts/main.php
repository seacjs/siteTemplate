<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;

AppAsset::register($this);

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

    <!-- Additional CSS  -->

    <!-- Additional JS  -->

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>

<?= $this->render('@app/views/layouts/block/header'); ?>

<?php if((Yii::$app->controller->id != 'site') && (Yii::$app->controller->action->id != 'index')):?>
    <?= $this->render('@app/views/layouts/block/breadcrumb'); ?>
 <?php endif ?>

<?= $content ?>

<?= $this->render('@app/views/layouts/block/footer'); ?>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
