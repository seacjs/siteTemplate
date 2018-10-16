<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Service */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', Yii::$app->controller->id), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?=Yii::$app->controller->id?>-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
        ],
    ]) ?>

    <h3>Images</h3>

    <div class="alert alert-info" role="alert">
        Здесь показан список картинок только загруженых на сервер. Если вы добавили картинку которая располагается на другом сервере, то задать ее параметры можно только в редакторе контента.
    </div>

    <!-- todo: сделать на этой странице возможность редактирования атрибутов alt и title -->
    <!-- todo: в будущем можно добавить что бы сделать отображались и кантинки из контента -->
    <!-- todo: вынести в отедльный файл блок картинок, он везде одинаковый, и вообще очень много поторяющихся элементов -->

    <?php $form = \yii\bootstrap\ActiveForm::begin()?>

    <h3>Main files</h3>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Картинка</th>
                <th>alt</th>
                <th>title</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($model->mainFiles as $file): ?>
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

    <h3>Content files</h3>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Картинка</th>
            <th>alt</th>
            <th>title</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($model->contentFiles as $file): ?>
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


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php \yii\bootstrap\ActiveForm::end()?>


</div>
