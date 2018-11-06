<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* SEO START*/
$seo = \app\models\Seo::find()
    ->select(['slug','title','description','keywords','h1'])
    ->where(['slug'=>'contacts'])
    ->one();

$this->title = $seo->title;
$this->registerMetaTag(['name' => 'keywords', 'content' => $seo->keywords], 'keywords');
$this->registerMetaTag(['name' => 'description', 'content' => $seo->description], 'description');
/* SEO END*/

$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container">
    <!--BREADCRUMBS -->

        <div class="breadcrumb-before"></div>
        <?= \yii\widgets\Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'homeLink' => [
                'label' => 'Главная',
                'url' => '/',
                ''
            ]
        ]) ?>

        <div class="breadcrumb-after"></div>

    <!--/BREADCRUMBS-->

    <h1 class="h1"><?=$seo->h1?></h1>

    <p>Клиника качественных услуг «Наша Стоматология»</p>

    <div class="row">
        <div class="col-sm-6">
            <div class="contacts-phone-icon">
                <?=$settings->phone?><br>
                <?=$settings->second_phone?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="contacts-vk-icon"><?=$settings->vk?></div>
        </div>
        <div class="col-sm-6">
            <div class="contacts-address-icon"><?=$settings->address?></div>
        </div>
        <div class="col-sm-6">
            <div class="contacts-facebook-icon"><?=$settings->facebook?></div>
        </div>
        <div class="col-sm-6">
            <div class="contacts-email-icon"><?=$settings->email?></div>
        </div>
        <div class="col-sm-6">
            <div class="contacts-instagram-icon"><?=$settings->instagram?></div>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="contacts-map">

        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%<?=$settings->map?>&amp;width=100%25&amp;height=480&amp;lang=ru_RU&amp;scroll=true"></script>

    </div>

</div>