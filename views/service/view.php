<?php


?>

<?=\app\widgets\JumboSection::widget([
    'h1' => $service->h1,
    'description' => $service->description,
    'image' => isset($service->file) ? $service->file->image : null
]);?>


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

    <?=$service->content?>

</div>


<!-- PRICE LIST-->
<div class="container">

    <h2>Цены</h2>

    <?php foreach($prices as $key => $price):?>

        <?php if(($key != 0) && ($prices[$key-1]->category_id != $price->category_id)):?>
            <h3><?=$price->categoryName?></h3>
        <?php endif ?>

        <?=$this->render('@app/views/price/_line-card',[
            'model' => $price
        ])?>

    <?php endforeach?>

</div>
<!--/PRICE LIST -->

<?=\app\widgets\ExamplesSection::widget([
    'examples' => $service->examples,
]);?>

<!-- ------------------ -->

<?=\app\widgets\ReviewsSection::widget([
    'reviews' => $service->reviews,
]);?>

<!-- ------------------ -->

<?=\app\widgets\DoctorsSection::widget([
    'doctors' => $service->doctors,
]);?>

<!-- ------------------ -->
<?=\app\widgets\SertificateSection::widget();?>
<?=\app\widgets\InteriorSection::widget();?>
<?=\app\widgets\ContactsSection::widget([
    'settings' => $settings,
]);?>
<!-- ------------------ -->
