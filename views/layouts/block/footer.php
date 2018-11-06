<?php

use \yii\helpers\Url;
use \yii\bootstrap\Html;

/* @var $service \app\models\Service */
/* @var $settings \app\models\Settings */

$settings = Yii::$app->params['settings'];
$services = \app\models\Service::find()->select(['id','slug','name'])->where(['parent_id' => null])->all();




//        'phone' => '+7 (812) 313-98-98'
//        'second_phone' => '+7 (921) 994-02-82'
//        'email' => 'info@nasha-stoma.ru'
//        'address' => 'СПб, м. Пр. Большевиков, ул. Латышских Стрелков, д. 1, лит. А, пом. 18-Н'
//        'address_short' => 'Санкт-Петербург, ул. Латышских Стрелков, д. 1, метро Пр. Большевиков'
//        'vk' => 'vk.com/nashastoma/'
//        'facebook' => 'facebook.com/nashastoma/'
//        'instagram' => 'instagram.com/nashastoma/'
//        'work_time' => 'c 9  до 21'
//        'work_days' => 'ужедневно'
//        'map' => 'https://yandex.ru/map-widget/v1/?um=constructor%3A7d4766c15e06e2148dcfbbd5e2c5efa96051a60a76a06a2c684218c73bd2a7c7&amp;source=constructor'
//        'about' => '...'

?>
<div class="clearfix"></div>
<footer class="">

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <div class="logo-img"></div><div class="navbar-label">Наша<br>Стоматология</div>
                        </div>
                        <div>
                            <a href="<?=$settings['vk']?>" class="vk-icon"></a>
                            <a href="<?=$settings['facebook']?>" class="facebook-icon"></a>
                            <a href="<?=$settings['instagram']?>" class="instagram-icon"></a>
                        </div>
                        <div class="copyright">
                            © 2009-<?=date('Y');?>
                        </div>

                    </div>
                    <div class="col-sm-6 hidden-xs">
                        <div class="address-icon"><?=$settings['address_short']?></div>
                        <div class="email-icon"><?=$settings['email']?></div>
                        <div class="phone-icon"><?=$settings['phone']?></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-4 hidden-xs">
                        <a href="/services" class="main-link">Услуги</a>
                        <?php foreach($services as $service):?>
                            <a href="/services/<?=$service->slug?>" class="second-link"><?=$service->name?></a>
                        <?php endforeach ?>
                    </div>
                    <div class="col-sm-4 hidden-xs">
                        <a href="/about" class="main-link">Клиника</a>
                            <a href="/equipment" class="second-link">Оборудование</a>
                            <a href="/sales" class="second-link">Акции</a>
                            <a href="/reviews" class="second-link">Отзывы</a>
                            <a href="/example" class="second-link">Примеры работ</a>
                            <a href="/blog" class="second-link">Блог</a>
                        <a class="main-link">Врачи</a>
                        <a class="main-link">Цены</a>
                    </div>
                    <div class="col-sm-4">
                        <div class="company-description">Агенство</div>
                        <div class="company-title">ADWHITE</div>
                        <div class="company-description">Сделало этот сайт в 2018м году.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>