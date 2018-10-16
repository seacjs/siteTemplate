<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Doctor */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="<?=Yii::$app->controller->id?>-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <h3>Main</h3>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <hr>

    <h3>Seo tags</h3>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>

    <hr>

    <?= $form->field($fileModel, 'files[]')->widget(FileInput::class, \app\models\File::initialOptions($fileModel, $model));?>

    <?= $form->field($model, 'content')->widget(CKEditor::class, [
        'options' => ['rows' => 6],
        'preset' => 'full',
        'clientOptions' => [
            'filebrowserUploadUrl' => '/admin/'.Yii::$app->controller->id.'/file-upload-cke?component='.Yii::$app->controller->id.'&component_id='.$model->id.'&multiple=false&model='.$model->classname(),
            'filebrowserUploadMethod' => 'xhr'
        ],

    ]) ?>

    <?= $form->field($model, 'content2')->widget(CKEditor::class, [
        'options' => ['rows' => 6],
        'preset' => 'full',
        'clientOptions' => [
            'filebrowserUploadUrl' => '/admin/'.Yii::$app->controller->id.'/file-upload-cke?component='.Yii::$app->controller->id.'&component_id='.$model->id.'&multiple=false&model='.$model->classname(),
            'filebrowserUploadMethod' => 'xhr'
        ],

    ]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'specialization')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'scientist')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'start_working')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList($model::getStatusesArray()) ?>

    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'services')->checkboxList(\app\models\Service::find()->select(['name'])->indexBy('id')->column(), []) ?>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
