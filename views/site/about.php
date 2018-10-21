<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'О нас';
$this->params['breadcrumbs'][] = $this->title;
?>

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

<div class="container">
    <?=$settings->about?>
</div>

<!-- ------------------ -->
<?=\app\widgets\SertificateSection::widget();?>
<?=\app\widgets\InteriorSection::widget();?>
<?=\app\widgets\ContactsSection::widget([
    'settings' => $settings,
]);?>
<!-- ------------------ -->
