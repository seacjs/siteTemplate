<?php

use yii\widgets\Breadcrumbs;

?>


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
