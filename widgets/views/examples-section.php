<?php

?>


<section class="section section-gray">
    <div class="container position-relative">

        <h2>Примеры работ</h2>

        <?php if(empty($reviews)):?>

            <?php
            $carouselItems = [];
            foreach($examples as $key => $example) {
                $carouselItems[] = [
                    'content' => $this->render('@app/views/example/_carouser-item', [
                        'model' => $example,
                    ])
                ];
            }

            ?>

            <div class="reviews-wrap">
                <?php echo  \omicronsoft\owlcarousel\OwlCarouselWidget::widget([
                    'options' => [
                        'class' => 'owl-carousel',
                    ],
                    'clientOptions' => [
                        'mouseDrag' => false,
                        'touchDrag' => false,
                        'pullDrag' => false,
                        'loop' => false,
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

            <div class="review-carousel-arrow-left"></div>
            <div class="review-carousel-arrow-right"></div>

        <?php endif ?>

</section>

