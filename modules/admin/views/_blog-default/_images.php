<?php

/* @var $this yii\web\View */
/* @var $files array app\models\File */

?>

<h5><?=$title?></h5>
<table class="table table-hover">
    <thead>
    <tr>
        <th>Картинка</th>
        <th>alt</th>
        <th>title</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($files as $file): ?>
        <tr>
            <td>
                <img src="<?= $file->image?>" class="img-thumbnail" style="height:100px">
                <?=\yii\bootstrap\Html::hiddenInput('ids[]',$file->id,[])?>
            </td>
            <td>
                <?=\yii\bootstrap\Html::input('string','alts[]',$file->alt,[])?>
            </td>
            <td>
                <?=\yii\bootstrap\Html::input('string','titles[]',$file->title,[])?>
            </td>
        </tr>
    <?php endforeach?>
    </tbody>
</table>
