<?php

?>


<section class="section section-gray">
    <div class="container position-relative">

        <h2>Примеры работ</h2>

        <?php if(empty($reviews)):?>

            <?php
            $carouselItems = [];
            foreach($reviews as $key => $review) {
                $carouselItems[] = [
                    'content' => $this->render('@app/views/review/_carouser-item', [
                        'review' => $review,
                    ])
                ];
            }

            $test =  '<div style="width: 100px;">'
                .\app\widgets\JuxtaposeWidget::widget([
                    'left_image' => 'https://pp.userapi.com/c629514/v629514735/2ff6f/nYtJrjpXs88.jpg?ava=1',
                    'right_image' => 'https://pp.userapi.com/c629514/v629514735/2ff6f/nYtJrjpXs88.jpg?ava=1',
                ]) . '</div>';
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
                    'items' => [
                        ['content' => $test],
                        ['content' => $test],
                        ['content' => $test],
                        ['content' => $test],
                    ],
                ]); ?>
            </div>

            <div class="review-carousel-arrow-left"></div>
            <div class="review-carousel-arrow-right"></div>

        <?php endif ?>

</section>

