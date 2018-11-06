<?php

/* SEO START*/
$seo = \app\models\Seo::find()
    ->select(['slug','title','description','keywords','h1'])
    ->where(['slug'=>'prices'])
    ->one();

$this->title = $seo->title;
$this->registerMetaTag(['name' => 'keywords', 'content' => $seo->keywords], 'keywords');
$this->registerMetaTag(['name' => 'description', 'content' => $seo->description], 'description');
/* SEO END*/

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
        'content' => $this->render('_service-prices', [
            'prices' => $service->prices
        ]),
//        'contentOptions' => ['class' => '' .($key === 0 ? ' in' : '')],
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

    <h1><?=$seo->h1?></h1>

    <div class="price-page-description">Цены на услуги клиники</div>

</div>

<div class="price-container container">
    <?php echo \yii\bootstrap\Collapse::widget([
        'items' => $items,
    ]); ?>
</div>

<div class="container">


    <!-- todo: some content here -->

    <!-- ------------------ -->

    <?=\app\widgets\SertificateSection::widget();?>
    <?=\app\widgets\InteriorSection::widget();?>

    <!-- ------------------ -->

    <?=\app\widgets\ContactsSection::widget([
        'settings' => $settings,
    ]);?>

</div>