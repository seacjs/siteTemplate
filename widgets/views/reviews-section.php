<?php

?>


<section class="section">
    <div class="container position-relative">

        <h2>Отзывы</h2>

        <?php if(!empty($reviews)):?>

            <?php
                $carouselItems = [];
                foreach($reviews as $key => $review) {
                    $carouselItems[] = [
                        'content' => $this->render('@app/views/review/_carousel-item', [
                            'model' => $review,
                        ])
                    ];
                }
            ?>

        <div class="reviews-wrap">
            <?php echo  \omicronsoft\owlcarousel\OwlCarouselWidget::widget([
                'options' => [
                    'id' => 'reviewCarousel',
                    'class' => 'owl-carousel',
                ],
                'clientOptions' => [
                    'mouseDrag' => false,
                    'touchDrag' => false,
                    'pullDrag' => false,
                    'loop' => true,
                    'autoplay' => false,
                    'margin' => 0,
                    'nav' => false,
                    'dots' => true,
                    'responsive' => [
                        '0' => [
                            'items' => 1,
                        ],
                        '960' => [
                            'items' => 1,
                        ],
                        '1200' => [
                            'items' => 1,
                        ],
                    ],
                ],
                'itemOptions' => ['class' => 'carousel-reviews-item'],
                'items' => $carouselItems,
            ]); ?>
        </div>

        <div class="review-arrows">
            <div class="review-carousel-arrow-left"></div>
            <div class="review-carousel-arrow-right"></div>
            <a href="/review" class="all-reviews">Все отзывы</a>
        </div>

        <?php endif ?>

</section>

