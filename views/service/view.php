<?php

/* @var $service \app\models\Service */
/* @var $parents array \app\models\Service */

/* SEO START*/
/* @var $seo \app\models\Seo */
$seo = \app\models\Seo::find()
    ->select(['slug','title','description','keywords','h1'])
    ->where(['slug'=>'service'])
    ->one();

$this->params['breadcrumbs'][] = ['label' => $seo->title, 'url' => ['index']];

$this->title = $model->title;
$this->registerMetaTag(['name' => 'keywords', 'content' => $model->keywords], 'keywords');
$this->registerMetaTag(['name' => 'description', 'content' => $model->description], 'description');
/* SEO END*/

if(!empty($parents)) {
    $rout = '/service/';
    foreach ($parents as $parent) {
        $rout .= $parent->slug .'/';
        $this->params['breadcrumbs'][] = ['label' => $parent->name, 'url' => [
                $rout
        ]];
    }
}

$this->params['breadcrumbs'][] = $service->name;


?>

<?=\app\widgets\JumboSection::widget([
    'h1' => $service->name,
    'description' => $service->jumbo_description,
    'image' => isset($service->mainFiles) && isset($service->mainFiles[1]) ? $service->mainFiles[1]->image : null
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

<?php if($service->parent_id !== null):?>
<noindex>
<?php endif ?>

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
<?php if($service->parent_id !== null):?>
</noindex>
<?php endif ?>
<!-- ------------------ -->

<?=$this->render('@app/views/elements/badges');?>
<?=\app\widgets\SertificateSection::widget();?>
<?=\app\widgets\InteriorSection::widget();?>
<?=\app\widgets\ContactsSection::widget([
    'settings' => $settings,
]);?>
<!-- ------------------ -->
