<?php

use yii\bootstrap\NavBar;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\Modal;

?>
<header class="affix">


    <div class="navbar-before">
        <div class="container position-relative">
            <div class="navbar-before-left"><?=Yii::$app->params['settings']['address_short']?></div>
            <div class="navbar-before-right"><?=Yii::$app->params['settings']['phone']?></div>

            <div class="btn btn-top">Записаться</div>
        </div>
    </div>

    <?php


    NavBar::begin([
        'id' => 'navbar-main',
        'brandLabel' => '<div class="logo-img"></div><div class="navbar-label">Наша<br>Стоматология</div>' ,
        'brandUrl' => '/',
        'options' => [
            'class' => ''
        ]
    ]);

    echo Nav::widget([
        'items' => [
            [
                'label' => 'Клиника',
                'url' => '/about',
            ],
            [
                'label' => 'Услуги',
                'url' => '/service',
            ],
            [
                'label' => 'Цены',
                'url' => '/prices',
            ],
            [
                'label' => 'Врачи',
                'url' => '/doctor',
            ],
            [
                'label' => 'Контакты',
                'url' => '/contacts',
            ],
        ],
        'options' => [
            'class' => 'navbar-nav top-menu'
        ],
    ]);



    NavBar::end();?>

</header>