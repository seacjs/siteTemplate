<?php

?>


<?php if(!empty($images)):?>
    <section class="section align-center">
        <div class="container">

            <h2>Интерьер</h2>

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
    </section>
<?php endif ?>