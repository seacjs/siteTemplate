<?php

use yii\bootstrap\Html;
use yii\bootstrap\Modal;
use yii\web\View;


/* @var $this yii\web\View */

$this->title = "Академия улыбки";
//$this->registerMetaTag(['name' => 'keywords', 'content' => 'yii, framework, php'], 'keywords');
$this->registerMetaTag(['name' => 'description', 'content' => ''], 'description');

?>

<section class="section" id="jumbo" data-spy="scroll" data-target="#navbar-main" class="scrollspy-example">

    <div class="inner-parallax">
<!--        --><?php //echo \lanselot\parallax\ParallaxWidget::widget([
//            'image' => 'images/jumbo.jpg',
//            'element' => 'parallax',
//            'minHeight' => '400px',
//        ]); ?>
    </div>

    <div class="inner-background"></div>
    <div class="inner-content">
        <div class="container">

            <h1>Стоматологическая клиника<br><b>«Академия Улыбки»</b><br></h1>
            <p class="description">Профессионально лечим зубы детям и взрослым<br> под наркозом и без </p>
            <button class="btn btn-main open-modal" data-toggle="modal" data-target="#callback-form">Запишитесь на прием</button>

        </div>
    </div>
</section>

<!-- ------------------ -->

<section class="section align-center" id="service-section">
    <div class="container">
        <h2>Услуги клиники</h2>
        <div class="row">

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="service-wrap">
                    <img src="/images/service/service-1.jpg" class="service-img">
                    <div class="service-title">Лечение зубов</div>
                    <div class="service-description">Быстро, надолго и без боли</div>
                    <div class="service-price"><div class="price-text">от 150000 руб</div></div>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>

    </div>
</section>

<!-- ------------------ -->

<section class="section" id="doctors-section" data-spy="scroll" data-target="#navbar-main" class="scrollspy-example">
    <div class="container">
        <div class="row">

            <h2 class="title-h2">Врачи</h2>

            <?php
            $doctors = [
                    [
                        'image' => '1',
                        'title' => '1',
                        'description' => '1',
                        'work' => '1',
                    ],
                    [
                        'image' => '2',
                        'title' => '2',
                        'description' => '2',
                        'work' => '2',
                    ],
                    [
                        'image' => '3',
                        'title' => '3',
                        'description' => '3',
                        'work' => '3',
                    ],
            ];
            $carouselDoctorItems = [];
            foreach($doctors as $key => $doctor) {
                $carouselDoctorItems[] = [
                    'content' => $this->render('@app/views/site/block/carouselDoctorItem', [
                        'doctor' => $doctor,
                    ])
                ];
            }
            ?>

            <div class="arrow-left"></div>
            <div class="arrow-right"></div>

            <?php echo  \omicronsoft\owlcarousel\OwlCarouselWidget::widget([
                'options' => [
                    'class' => 'owl-carousel',
                ],
                'clientOptions' => [
                    'loop' => true,
                    'margin' => 0,
                    'nav' => true,
                    'dots' => true,
                    'responsive' => [
                        '0' => [
                            'items' => 1,
                        ],
                        '960' => [
                            'items' => 2,
                        ],
                        '1600' => [
                            'items' => 3,
                        ],
                    ],
                ],
                'itemOptions' => ['class' => 'carousel-reviews-item'],
                'items' => $carouselDoctorItems,
            ]); ?>

        </div>
</section>


<!-- ------------------ -->


<section class="section" id="reviews-section" data-spy="scroll" data-target="#navbar-main" class="scrollspy-example">
    <div class="container-fluid">

        <h2 class="title-h2">Отзывы</h2>

        <?php
        $reviews = [
            [
                'image' => '1',
                'name' => '1',
                'text' => '1',
            ],
            [
                'image' => '2',
                'name' => '2',
                'text' => '2',
            ],
            [
                'image' => '3',
                'name' => '3',
                'text' => '3',
            ],
            [
                'image' => '4',
                'name' => '4',
                'text' => '4',
            ],
            [
                'image' => '5',
                'name' => '5',
                'text' => '5',
            ],
            [
                'image' => '6',
                'name' => '6',
                'text' => '6',
            ],
        ];

        $carouselItems = [];
        foreach($reviews as $key => $review) {
            $carouselItems[] = [
                'content' => $this->render('@app/views/site/block/carouselReviewItem', [
                    'review' => $review,
                ])
            ];
        }
        ?>

        <div class="arrow-left"></div>
        <div class="arrow-right"></div>

        <?php echo  \omicronsoft\owlcarousel\OwlCarouselWidget::widget([
            'options' => [
                'class' => 'owl-carousel',
            ],
            'clientOptions' => [
                'loop' => true,
                'margin' => 0,
                'nav' => true,
                'dots' => true,
                'responsive' => [
                    '0' => [
                        'items' => 1,
                    ],
                    '960' => [
                        'items' => 1,
                    ],
                    '1600' => [
                        'items' => 2,
                    ],
                ],
            ],
            'itemOptions' => ['class' => 'carousel-reviews-item'],
            'items' => $carouselItems,
        ]); ?>


    </div>
</section>


<!-- ------------------ -->


<section class="section" id="contacts-section" data-spy="scroll" data-target="#navbar-main" class="scrollspy-example">
    <div class="container">
        <h2>Контакты</h2>


    </div>
</section>

<!-- ------------------ -->


<!-- MODAL CALLBACK-->
<?
Modal::begin([
    'header' => '&nbsp;Оставьте вашу заявку',
    'toggleButton' => false,
    'options' => [
        'id' => 'callback-form',
    ]
]);

//echo $this->render('@app/views/layouts/block/callbackForm', [
//    'callbackModel' => $callbackModel
//]);

Modal::end();
?>

<!-- MODAL SENDED-->

<?Modal::begin([
    'header' => 'Заявка оставлена',
    'clientOptions' => [
        'show' => $emailSended
    ],
]);?>
<p>Ваша заявка отправлена, наши менеджеры свяжутся с вами.</p>
<hr>
<?= Html::button(Yii::t('app', 'Закрыть'), ['class' => 'btn btn-black', 'data-dismiss' => 'modal'])?>

<? Modal::end() ?>
<?if($emailSended):?>
    <?php $this->registerJs("yaCounter____number___.reachGoal('formReadySended');",View::POS_LOAD)?>
<?endif?>