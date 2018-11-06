<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

/* SEO START*/
/* @var $seo \app\models\Seo */
$seo = \app\models\Seo::find()
    ->select(['slug','title','description','keywords','h1'])
    ->where(['slug'=>'sales'])
    ->one();

$this->title = $seo->title;
$this->registerMetaTag(['name' => 'keywords', 'content' => $seo->keywords], 'keywords');
$this->registerMetaTag(['name' => 'description', 'content' => $seo->description], 'description');
/* SEO END*/

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

    <h1 class="h1"><?=$seo->h1?></h1>

</div>

<div class="container">
    <div class="row">
        <?php foreach($sales as $sale):?>
            <div class="col-sm-4">
                <?=$this->render('@app/views/sales/_basic-card',[
                    'model' => $sale,
                ])?>
            </div>
        <?php endforeach ?>
    </div>
    <div class="clearfix"></div>
</div>

<!-- ------------------ -->
<?=\app\widgets\SertificateSection::widget();?>
<?=\app\widgets\InteriorSection::widget();?>
<?=\app\widgets\ContactsSection::widget([
    'settings' => $settings,
]);?>
<!-- ------------------ -->
