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

<!--    <div class="inner-background"></div>-->
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
        <h2>Услуги клиники<div class="h2-after hidden-xs"></div></h2>
        <div class="row">

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="service-wrap">
                    <img src="/images/service/service-1.jpg" class="service-img">
                    <div class="service-title">Лечение зубов</div>
                    <div class="service-description">Быстро, надолго<br> и без боли</div>
                    <div class="service-price"><div class="price-text">от 3000 руб</div></div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="service-wrap">
                    <img src="/images/service/service-2.jpg" class="service-img">
                    <div class="service-title">Детская стоматология</div>
                    <div class="service-description">Без слез и плача! Доступно<br> лечение во сне</div>
                    <div class="service-price"><div class="price-text">от 2000 руб</div></div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="service-wrap">
                    <img src="/images/service/service-3.jpg" class="service-img">
                    <div class="service-title">Протезирование</div>
                    <div class="service-description">Коронки, мосты, съемные и<br> несъемные протезы. Виниры</div>
                    <div class="service-price"><div class="price-text">от 9000 руб</div></div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="service-wrap">
                    <img src="/images/service/service-4.jpg" class="service-img">
                    <div class="service-title">Имплантация зубов</div>
                    <div class="service-description">Полное восстановление<br> утеряного зуба</div>
                    <div class="service-price"><div class="price-text">от 150000 руб</div></div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="service-wrap">
                    <img src="/images/service/service-5.jpg" class="service-img">
                    <div class="service-title">Отбеливание зубов</div>
                    <div class="service-description">Безопасная процедура, быстрый<br> результат на 1-2 года</div>
                    <div class="service-price"><div class="price-text">от 3000 руб</div></div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="service-wrap">
                    <img src="/images/service/service-6.jpg" class="service-img">
                    <div class="service-title">Исправление прикуса</div>
                    <div class="service-description">Брекеты (в т.ч. невидимые),<br> съемные пластинки, элайнеры</div>
                    <div class="service-price"><div class="price-text">от 3000 руб</div></div>
                </div>
                <div class="clearfix"></div>
            </div>

        </div>

    </div>
</section>

<!-- ------------------ -->

<section class="section" id="doctors-section" data-spy="scroll" data-target="#navbar-main" class="scrollspy-example">
    <div class="container position-relative">

            <h2>Врачи<div class="h2-after hidden-xs"></div></h2>


            <?php
            $doctors = [
                    [
                        'image' => '1',
                        'title' => 'Константинопольский Константин Константинович',
                        'description' => 'Главный врач клиник<br>Кандидат медицинских наук<br>Ортопед, хирург',
                        'work' => 'Опыт работы: 15 лет',
                    ],
                    [
                        'image' => '2',
                        'title' => 'Константинопольский Константин Константинович\'',
                        'description' => 'Главный врач клиник<br>Кандидат медицинских наук<br>Ортопед, хирург',
                        'work' => 'Опыт работы: 15 лет',
                    ],
                    [
                        'image' => '3',
                        'title' => 'Константинопольский Константин Константинович\'',
                        'description' => 'Главный врач клиник<br>Кандидат медицинских наук<br>Ортопед, хирург',
                        'work' => 'Опыт работы: 15 лет',
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

            <div class="doctors-wrap">
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
                            '1200' => [
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
    <div class="container position-relative">

        <h2>Отзывы<div class="h2-after hidden-xs"></div></h2>

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

        <div class="arrow-left arrow-left-review"></div>
        <div class="arrow-right arrow-right-review"></div>
        <div class="reviews-wrap">
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
                        '1200' => [
                            'items' => 2,
                        ],
                    ],
                ],
                'itemOptions' => ['class' => 'carousel-reviews-item'],
                'items' => $carouselItems,
            ]); ?>
        </div>


    </div>
</section>


<!-- ------------------ -->


<section class="section" id="contacts-section" data-spy="scroll" data-target="#navbar-main" class="scrollspy-example">
    <div class="container">
        <h2>Контакты<div class="h2-after hidden-xs"></div></h2>

        <div class="map-wrap">
            <div class="map-inner">
                <div class="map">
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3AeaXlHc75D7E8CYjmolHemOKo2jtAS6Jg&amp;width=100%25&amp;height=480&amp;lang=ru_RU&amp;scroll=false"></script>
                </div>
                <div class="map-info-wrap">
                    <div class="map-info">
                        <div class="map-info-description">
                            <div class="map-info-title">Телефон: </div> <?=$mapInfo['phone']?>
                        </div>
                        <div class="map-info-description">
                            <div class="map-info-title">Адрес: </div> <?=$mapInfo['address']?>
                        </div>
                        <div class="map-info-description">
                            <div class="map-info-title">Часы работы: </div> <?=$mapInfo['work']?>
                        </div>
                        <div class="map-info-description">
                            <div class="map-info-title">E-Mail: </div> <?=$mapInfo['email']?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ------------------ -->


<!-- MODAL CALLBACK-->
<?php
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

<?php Modal::begin([
    'header' => 'Заявка оставлена',
    'clientOptions' => [
        'show' => (isset($emailSended) && $emailSended === true) ? true : false
    ],
]);?>
<p>Ваша заявка отправлена, наши менеджеры свяжутся с вами.</p>
<hr>
<?= Html::button(Yii::t('app', 'Закрыть'), ['class' => 'btn btn-black', 'data-dismiss' => 'modal'])?>

<?php Modal::end() ?>

<?php if(isset($emailSended) && $emailSended === true):?>
<!--  todo: сделать модуль добавления яндекс метрики и событий более простым, типа виджета  -->
<!--  событие яндекс метрики  -->
    <?php $this->registerJs("yaCounter____number___.reachGoal('formReadySended');",View::POS_LOAD)?>
<?php endif?>