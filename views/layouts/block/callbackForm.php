<?php

use yii\bootstrap\Html;
use yii\widgets\ActiveForm;

?>


<div class="col-sm-8 col-sm-offset-2 align-center">Оставьте ваши данные и мы свяжемся с вами.</div>

<?php $form = ActiveForm::begin() ?>

<div class="align-center">
    <?= $form->field($callbackModel, 'name', ['inputOptions' => [ 'class' => 'input']])->textInput()
        ->input('name', ['placeholder' => Yii::t('app','contact_form_name')])->label(false);  ?>
</div>
<div class="align-center">
    <?= $form->field($callbackModel, 'phone', ['inputOptions' => [ 'class' => 'input', 'id' => 'phone']])->textInput()
        ->input('phone', ['placeholder' => Yii::t('app','contact_form_phone')])->label(false);  ?>
</div>
<!--    <div>--><?//= $form->field($model, 'option')->hiddenInput(['value'=> 'callback form'])->label(false);?><!--</div>-->
<div class="align-center">
    <button href="#" id="submit-button" role="button" type="submit" class="btn btn-secondary btn-buy">жду звонка</button>
</div>

<?php ActiveForm::end() ?>


