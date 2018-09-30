<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="news-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <h3>Main</h3>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <button class="btn btn-info">Сгенерировать slug на основе названия.</button>

    <hr>

    <h3>Seo tags</h3>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>

    <hr>

    <!--  TODO: добавить к файлам параметр, что бы к записи могли крепиться другие картинки в контенте  -->
    <!--  todo: и сделать afterSave -> find images in content -->
    <!--  todo: auto upload file after chose -->
    <?= $form->field($fileModel, 'files[]')->widget(FileInput::class, \app\models\File::initialOptions($fileModel, $model));?>

    <!--todo: Можно Добавить к файлам статус загрузки, и сделать к файлам процесс после сохранения, при котором будут меняться
        todo: статусы типа action_status , например: STATUS_WAIT_UPLOAD и STATUS_WAIT_DELETE -->
        <!--todo: сделать возможным загрузку файлов если на странице есть несколько виджетов (а то чего активируется только один, остальыне блочаться)-->
    <?= $form->field($model, 'content')->widget(CKEditor::class, [
        'options' => ['rows' => 6],
        'preset' => 'basic',
        'clientOptions' => [
            'filebrowserUploadUrl' => '/admin/'.Yii::$app->controller->id.'/file-upload-cke?component='.Yii::$app->controller->id.'&component_id='.$model->id.'&multiple=false&model='.$model->classname(),
            'filebrowserUploadMethod' => 'xhr'
        ],

    ]) ?>

    <?= $form->field($model, 'status')->dropDownList($model::getStatusesArray()) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
