<?php


?>

<?php if(!empty($images)):?>
    <section class="section align-center">
        <div class="container">

            <h2>Сертификаты</h2>

            <div class="row">

                <?php foreach($images as $image):?>

                    <div class="col-sm-4">
                        <img src="<?=$image->image?>" class="sertificate-img">
                    </div>

                <?php endforeach?>

            </div>

        </div>
    </section>
<?php endif ?>