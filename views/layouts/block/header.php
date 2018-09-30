<?php

use yii\bootstrap\NavBar;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\Modal;

?>
<header class="affix">

    <?php

    $contacts = '<div class="header-contacts">
                <div class="header-phone">+7 (999) 999-99-99</div> 
                <div class="contacts-desc">&nbsp;с 9 до 21, ежедневно</div>
                <div class="contacts-desc hidden-xs">г. Брянск, ул. Ленина 16</div>
            </div>';

    NavBar::begin([
        'id' => 'navbar-main',
        'brandLabel' => '<div class="logo-img"></div>' . $contacts,
        'brandUrl' => '#jumbo',
        'options' => [
            'class' => ''
        ]
    ]);

    echo Nav::widget([
        'items' => [
//            [
//                'label' => 'Услуги',
//                'url' => '#service-section',
//                'linkOptions' => [
//                    'onclick' => 'return false;'
//                ]
//            ],
//            [
//                'label' => 'Врачи',
//                'url' => '#doctors-section',
//                'linkOptions' => [
//                    'onclick' => 'return false;'
//                ]
//            ],
//            [
//                'label' => 'Отызвы',
//                'url' => '#reviews-section',
//                'linkOptions' => [
//                    'onclick' => 'return false;'
//                ]
//            ],
//            [
//                'label' => 'Контакты',
//                'url' => '#contacts-section',
//                'linkOptions' => [
//                    'onclick' => 'return false;'
//                ]
//            ],
            ''
        ],
        'options' => [
            'class' => 'navbar-nav top-menu'
        ],
    ]);

    NavBar::end();?>

</header>