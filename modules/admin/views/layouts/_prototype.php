<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AdminAsset;

AdminAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <!-- NavBar -->
    <?php if($layoutOptions['nav-bar']): ?>
        <?php
        NavBar::begin([
            'brandLabel' => 'Smile CP',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Акции', 'url' => ['/admin/sales/index']],
                ['label' => 'Блог', 'url' => ['/admin/blog/index']],
                ['label' => 'Услуги', 'url' => ['/admin/service/index']],
                ['label' => 'Цены', 'url' => ['/admin/price/index']],
                ['label' => 'Врачи', 'url' => ['/admin/doctor/index']],
                ['label' => 'Отзывы', 'url' => ['/admin/review/index']],
                ['label' => 'Примеры работ', 'url' => ['/admin/example/index']],
                ['label' => 'Основное', 'items' => [
                    ['label' => 'Настройки', 'url' => ['/admin/settings/index']],
                    ['label' => 'Сертификаты', 'url' => ['/admin/sertificate/index']],
                    ['label' => 'Интерьер', 'url' => ['/admin/interior/index']],
                ]],
                Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/admin/default/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/admin/default/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
        NavBar::end();
        ?>
    <?php endif ?>
    <!--/navBar -->

    <div class="container">

        <!-- Breadcrumbs -->
        <?php if($layoutOptions['breadcrumbs']): ?>
            <?php
                $breadcrumbs = isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [];
                array_unshift($breadcrumbs,['label' => 'control panel', 'url' => '/admin']);
            ?>
            <?= Breadcrumbs::widget([
                'links' => $breadcrumbs,
                'homeLink' => [
                    'label' => 'Site',
                    'url' => '/',
                ]
            ]) ?>
        <?php endif ?>
        <!--/breadcrumbs -->

        <!-- Alert -->
        <?php if($layoutOptions['alert']): ?>
            <?= Alert::widget() ?>
        <?php endif ?>
        <!--/alert -->

        <!-- Content -->
        <?= $content ?>
        <!--/content -->


    </div>
</div>

<!-- Footer -->
<?php if($layoutOptions['footer']): ?>
    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
<?php endif ?>
<!--/footer -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
