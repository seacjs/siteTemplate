<?php


?>

<section class="section align-center">
    <div class="container">
        <h2>Услуги клиники</h2>

        <div class="row">
            <?php foreach($services as $service): ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <?=$this->render('@app/views/service/_basic-item', [
                        'model' => $service
                    ])?>
                </div>
            <?php endforeach; ?>

        </div>

    </div>
</section>
