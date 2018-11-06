<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="<?=Yii::$app->controller->id?>-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <h3>Main</h3>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'second_phone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'address_short')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vk')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'facebook')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'instagram')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_time')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'work_days')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'map')->textarea(['maxlength' => true]) ?>

    <hr>

    <?= $form->field($model, 'about')->widget(CKEditor::class, [
        'options' => ['rows' => 6],
        'preset' => 'basic',
        'clientOptions' => [
            'contentsCss' => '/css/style.css',
            'filebrowserUploadUrl' => '/admin/'.Yii::$app->controller->id.'/file-upload-cke?component='.Yii::$app->controller->id.'&component_id='.$model->id.'&multiple=false&model='.$model->classname(),
            'filebrowserUploadMethod' => 'xhr'
        ],

    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
