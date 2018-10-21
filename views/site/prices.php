<?php

$this->title = 'Цены';
$this->params['breadcrumbs'][] = $this->title;

$items = [];

$sctipt = <<< JS
$('.panel-default .panel-heading').filter(':first').addClass("active-panel");
$('.panel-default').on('show.bs.collapse',function() {
    $(this).find('.panel-heading').addClass("active-panel");
});

$('.panel-default').on('hide.bs.collapse',function() {
    $(this).find('.panel-heading').removeClass("active-panel");
});
JS;

$this->registerJs($sctipt, \yii\web\View::POS_READY);

foreach($services as $key => $service) {

    $items[] = [
        'label' => $service->name,
        'content' => $this->render('_service-prices',[
            'prices' => $service->prices
        ]),
        'contentOptions' => ['class' => '' .($key === 0 ? ' in' : '')],
//        'options' => [],
//        'footer' => 'Footer'
    ];
}

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

    <h1><?=$this->title?></h1>

    <div class="">Цены на услуги клиники</div>

    <?php echo \yii\bootstrap\Collapse::widget([
        'items' => $items,
    ]); ?>

    <!-- todo: some content here -->

    <!-- ------------------ -->

    <?=\app\widgets\SertificateSection::widget();?>
    <?=\app\widgets\InteriorSection::widget();?>

    <!-- ------------------ -->

    <?=\app\widgets\ContactsSection::widget([
        'settings' => $settings,
    ]);?>

</div>