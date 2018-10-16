<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Doctor */

$this->title = Yii::t('app', 'Create ' .Yii::$app->controller->id );
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', Yii::$app->controller->id), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?=Yii::$app->controller->id?>-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'fileModel' => $fileModel,
    ]) ?>

</div>
