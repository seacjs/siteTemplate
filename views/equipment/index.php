<?php

/* @var $provider \yii\data\ActiveDataProvider */


/* SEO START*/
/* @var $seo \app\models\Seo */
$seo = \app\models\Seo::find()
    ->select(['slug','title','description','keywords','h1'])
    ->where(['slug'=>'equipment'])
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

    <?php echo \yii\widgets\ListView::widget([
        'dataProvider' => $provider,
        'itemView' => '_item',
        'summary' => '',
        'viewParams' => [
            'showArrows' => false,
        ]
    ]); ?>

</div>