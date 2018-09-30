<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */
/* @var $fileModel app\models\File */

$this->title = Yii::t('app', 'Update Blog: {nameAttribute}', [
    'nameAttribute' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blog'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="news-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'fileModel' => $fileModel,
    ]) ?>

</div>
