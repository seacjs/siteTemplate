<?php



?>


<section class="section section-gray">
    <div class="container position-relative">

        <h2>Примеры работ</h2>

        <?php if(!empty($examples)):?>

            <?php
            $carouselItems = [];
            foreach($examples as $key => $example) {
                $carouselItems[] = [
                    'content' => $this->render('@app/views/example/_carousel-item', [
                        'model' => $example,
                    ])
                ];
            }

            ?>

            <div class="example-wrap">
                <?php echo  \omicronsoft\owlcarousel\OwlCarouselWidget::widget([
                    'options' => [
                        'id' => 'exampleCarousel',
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
                        'dots' => false,
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

        <?php endif ?>

</section>

