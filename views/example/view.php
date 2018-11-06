<?php

/* @var $model \app\models\Example */

/* SEO START*/
/* @var $seo \app\models\Seo */
$seo = \app\models\Seo::find()
    ->select(['slug','title','description','keywords','h1'])
    ->where(['slug'=>'example'])
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


    <?php if(!empty($images)):?>
        <div class="section align-center">

            <div class="row">

                <?php foreach($images as $image):?>

                    <div class="col-sm-4">
                        <div class="interior-img-wrap">
                            <?= \branchonline\lightbox\Lightbox::widget([
                                'files' => [
                                    [
                                        'thumbOptions' => [
                                            'class' => 'interior-img',
                                        ],
                                        'thumb' => $image->thumbnail,
                                        'original' => $image->image,
                                    ],
                                ]
                            ]);?>
                        </div>
                    </div>

                <?php endforeach?>

            </div>
        </div>
    <?php endif ?>

    <div>
        <?=$model->content ?>
    </div>

</div>

<?php //echo \app\widgets\DoctorsSection::widget([
//    'doctors' => $model->doctors,
//])?>

<?php //echo \app\widgets\ServicesSection::widget([
//    'services' => $model->services,
//])?>

<?php //echo \app\widgets\ReviewsSection::widget([
//    'reviews' => $model->reviews,
//])?>

