<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Seo */

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


    <!-- todo: сделать на этой странице возможность редактирования атрибутов alt и title -->
    <!-- todo: в будущем можно добавить что бы сделать отображались и кантинки из контента -->
    <!-- todo: вынести в отедльный файл блок картинок, он везде одинаковый, и вообще очень много поторяющихся элементов -->

    <?php $form = \yii\bootstrap\ActiveForm::begin()?>
    <div class="row">
        <div class="col-sm-10">

            <h4>Images</h4>

            <?php echo $this->render('_images', [
                'title' => 'Main files',
                'files' => $model->mainFiles,
            ]); ?>

            <?php echo $this->render('_images', [
                'title' => 'Content files',
                'files' => $model->contentFiles,
            ]); ?>

            <div class="alert alert-info" role="alert">
                Здесь показан список картинок только загруженых на сервер. Если вы добавили картинку которая располагается на другом сервере, то задать ее параметры можно только в редакторе контента.
            </div>


        </div>
        <div class="col-sm-2" style="position: relative;">
            <div class="form-group" style="position: fixed;">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <?php \yii\bootstrap\ActiveForm::end()?>


</div>
