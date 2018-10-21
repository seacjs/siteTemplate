<?php

/* @var $doctor app\models\Doctor */

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

<div class="doctor-page">
    <div class="container">

        <div class="row">

            <div class="col-sm-6">
                <h1><?=$doctor->h1?>1111</h1>

                <div class="title">Должность</div>
                <div class="description"><?=$doctor->position?></div>

                <div class="title">Ученая степень</div>
                <div class="description"><?=$doctor->scientist?></div>

                <div class="title">Специализация</div>
                <div class="description"><?=$doctor->specialization?></div>

                <div class="title">Стаж работы</div>
                <div class="description">С <?=$doctor->start_working?> года</div>

            </div>

            <div class="col-sm-6">
                <?php if($doctor->file != null):?>
                    <div class="image">
                        <img src="<?=$doctor->file->image?>">
                    </div>
                <?php endif ?>
            </div>

        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-sm-6">
                <div class="main-title">Образование:</div>
                <?=$doctor->content?>
            </div>

            <div class="col-sm-6">
                <div class="main-title">Повышение квалификации:</div>
                <?=$doctor->content2?>
            </div>

        </div>
    </div>
</div>



<?=\app\widgets\ExamplesSection::widget([
    'examples' => $doctor->examples,
]);?>


<!-- ------------------ -->

<?=\app\widgets\ServicesSection::widget([
    'services' => $doctor->services,
]);?>

<!-- ------------------ -->

<?=\app\widgets\ReviewsSection::widget([
    'reviews' => $doctor->reviews,
]);?>


<!-- ------------------ -->
<?=\app\widgets\SertificateSection::widget();?>
<?=\app\widgets\InteriorSection::widget();?>
<?=\app\widgets\ContactsSection::widget([
    'settings' => $settings,
]);?>
<!-- ------------------ -->
