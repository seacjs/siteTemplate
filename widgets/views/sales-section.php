<?php


?>

<section class="section align-center">
    <div class="container">
        <h2>Акции</h2>

        <div class="row">
            <?php foreach($sales as $sale): ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service-wrap">
                        <img src="/images/service/service-1.jpg" class="service-img">
                        <div class="service-title">Лечение зубов</div>
                        <div class="service-description">Быстро, надолго<br> и без боли</div>
                        <div class="service-price"><div class="price-text">от 3000 руб</div></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>
</section>