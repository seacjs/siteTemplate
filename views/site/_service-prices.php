<?php


?>

<?php foreach($prices as $key => $price):?>
    <li>
        <div class="row">
            <?php if(($key != 0) && ($prices[$key-1]->category_id != $price->category_id) && ($price->category_id != null)):?>
                <div class="col-sm-12">
                    <div class="collapse-title">
                        <?=$price->category->name?>
                    </div>
                </div>
            <?php endif?>
            <div class="col-sm-8 col-xs-8"><?=$price->name?></div>
            <div class="col-sm-4 col-xs-4 align-right price"><?=$price->price?></div>
            <div class="col-sm-12">
                <?php if(trim($price->description) != ''):?>
                    <div class="description">
                        <?=$price->description?>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </li>
<?php endforeach;?>



