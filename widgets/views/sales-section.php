<?php

$margin = $noMargin ? 'margin-top: 60px !important;top:0px !important;' : '';

?>

<section class="section align-center">
    <div class="container">

        <div class="sales-wrap main-sales" style="<?=$margin?>">

            <h2>Акции</h2>

            <div class="row">
                <?php foreach($sales as $sale): ?>
                    <div class="col-md-6">
                        <div class="sales-block">
                            <div class="col-sm-6">
                                <div class="sales-title"><?=$sale->value?></div>
                            </div>
                            <div class="col-sm-6">
                                <div class="sales-description">
                                    <?=$sale->description?>
                                </div>
                                <div class="sales-date">
                                    <?=$sale->date?>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <?php endforeach; ?>
                <div class="clearfix"></div>
            </div>

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-sm-12 align-left">
                    <a class="btn btn-main" href="#callbackwidget">Записаться</a>
                    <div class="sales-info">← Запишитесь и мы продлим срок действия акции персонально для вас!</div>
                </div>
            </div>
            <div class="clearfix"></div>

        </div>


    </div>
</section>