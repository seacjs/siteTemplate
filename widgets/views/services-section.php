<?php


?>

<section class="section align-center">
    <div class="container">

        <?php if($title !== null):?>
        <h2>Услуги клиники</h2>
        <?php endif ?>

        <div class="row">
            <?php foreach($services as $key => $service): ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <?=$this->render('@app/views/service/_basic-item', [
                        'model' => $service
                    ])?>
                </div>


                <?php if(($key+1)%3 === 0):?>
                    <div class="clearfix visible-lg"></div>
                <?php endif ?>

                <?php if(($key+1)%2 === 0):?>
                    <div class="clearfix visible-md"></div>
                <?php endif ?>

            <?php endforeach; ?>

        </div>

    </div>
</section>
