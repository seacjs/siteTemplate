<?php

/* SEO START*/
$seo = \app\models\Seo::find()
    ->select(['slug','title','description','keywords','h1'])
    ->where(['slug'=>'service'])
    ->one();

$this->title = $seo->title;
$this->registerMetaTag(['name' => 'keywords', 'content' => $seo->keywords], 'keywords');
$this->registerMetaTag(['name' => 'description', 'content' => $seo->description], 'description');
/* SEO END*/

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

<h1 class="h1"><?=$seo->h1?></h1>

<?=\app\widgets\ServicesSection::widget([
    'title' => null,
    'services' => $services,
]);?>

<!-- ------------------ -->
<?=\app\widgets\SertificateSection::widget();?>
<?=\app\widgets\InteriorSection::widget();?>
<?=\app\widgets\ContactsSection::widget([
    'settings' => $settings,
]);?>
<!-- ------------------ -->
