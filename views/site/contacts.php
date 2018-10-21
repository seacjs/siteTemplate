<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container">
    <!--BREADCRUMBS -->
    <div class="container">
        <div class="breadcrumb-before"></div>
        <?= \yii\widgets\Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'homeLink' => [
                'label' => 'Главная',
                'url' => '/',
                ''
            ]
        ]) ?>

        <div class="breadcrumb-after"></div>
    </div>
    <!--/BREADCRUMBS-->



</div>