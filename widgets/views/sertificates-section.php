<?php


?>

<?php if(!empty($images)):?>
    <section class="section align-center">
        <div class="container">

            <h2>Сертификаты</h2>

            <div class="row">

                <?php foreach($images as $image):?>

                    <div class="col-sm-3 col-xs-10 col-xs-offset-1">
                        <div class="sertificate-img">
                        <?= \branchonline\lightbox\Lightbox::widget([
                            'files' => [
                                [   'class' => 'sertificate-img',
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