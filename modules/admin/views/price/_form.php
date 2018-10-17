<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Price */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="<?=Yii::$app->controller->id?>-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <h3>Main</h3>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_id')->dropDownList(\app\models\Service::find()->select('name')->indexBy('id')->column()) ?>

    <?= $form->field($model, 'categoryName')->widget(\yii\jui\AutoComplete::className(), [
        'clientOptions' => [
            'source' => \app\models\PriceCategory::find()->column(),
        ],
        'options'=>[
            'value' => $model->category_id != null ? $model->category->name : '',
            'class'=>'form-control'
        ]
    ]); ?>


    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'info')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'tags')->textInput(['maxlength' => true, 'placeholder' => 'Теги через запятую']) ?>
    <?= $form->field($model, 'efficiency')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'speed')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'aesthetics')->textInput(['maxlength' => true]) ?>




    <hr>

    <?= $form->field($model, 'status')->dropDownList($model::getStatusesArray()) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
