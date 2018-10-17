<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Sales */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="<?=Yii::$app->controller->id?>-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <h3>Main</h3>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>


    <?php echo \kartik\date\DatePicker::widget([
        'model' => $model,
        'name' => 'Sales[date_at]',
        'value' => $model->date_at == null ? '' : date('d.m.Y', $model->date_at),
        'options' => ['placeholder' => 'выберите дату окончания акции'],
        'pluginOptions' => [
            'format' => 'dd.mm.yyyy',
            'todayHighlight' => true
        ]
    ])

    ?>

    <?= $form->field($model, 'date')->textInput(['maxlength' => true]) ?>

    <hr>

    <?= $form->field($model, 'status')->dropDownList($model::getStatusesArray()) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
