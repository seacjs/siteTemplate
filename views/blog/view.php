<?php

/* @var $model \app\models\Blog */

/* SEO START*/
/* @var $seo \app\models\Seo */
$seo = \app\models\Seo::find()
    ->select(['slug','title','description','keywords','h1'])
    ->where(['slug'=>'blog'])
    ->one();

$this->params['breadcrumbs'][] = ['label' => $seo->title, 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->h1;

$this->title = $model->title;
$this->registerMetaTag(['name' => 'keywords', 'content' => $model->keywords], 'keywords');
$this->registerMetaTag(['name' => 'description', 'content' => $model->description], 'description');
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

<div class="container">

    <h1 class="h1"><?=$model->h1?></h1>

    <div>
        <?=$model->content ?>
    </div>

</div>
