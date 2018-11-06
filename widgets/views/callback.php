<?php

use yii\bootstrap\Modal;
use yii\bootstrap\ActiveForm;

use app\widgets\assets\CallbackAsset;

CallbackAsset::register($this);

$script = <<< JS
    $(function($) {
        $(".callbackform-phone").mask("+7 (999) 999-99-99");
    });
JS;

$this->registerJs($script, \yii\web\View::POS_READY);

?>

<?php Modal::begin([
    'header' => '',
    'toggleButton' => [
        'class' => $toggleButtonClass,
        'label' => 'Записаться'
    ],
    'options' => [
        'class' => 'modal-basic fade'
    ],
]);?>

    <div class="title">Заполните форму</div>
    <div class="description">Мы перезвоним вам  в течение нескольких минут</div>

    <?php $form = ActiveForm::begin()?>

    <?=$form->field($model,'name')->textInput()->label('Имя')?>

    <?=$form->field($model , 'phone')->textInput([
        'class' => 'form-control callbackform-phone'
    ])->label('Телефон')?>

    <button class="submit-button">Отправить</button>

    <?php ActiveForm::end()?>

    <div class="politics">Нажимая на кнопку “Отправить” вы соглашаетесь с <a href="/politics">политикой конфиденциальности</a></div>

<?php Modal::end();?>

<!-- form sended -->

<?php if($send):?>
    <?php Modal::begin([
        'header' => '',
        'toggleButton' => false,
        'clientOptions' => [
            'show' => $send
        ],
        'options' => [
            'class' => 'modal-basic fade'
        ],
    ]);?>

        <div class="title">Форма отправлена</div>
        <div class="description">Мы свяжемся с вами в ближайшее время</div>


    <?php Modal::end();?>

<?php endif ?>


