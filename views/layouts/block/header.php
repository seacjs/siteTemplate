<?php

use yii\bootstrap\NavBar;
use yii\bootstrap\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Nav;
use yii\bootstrap\Modal;

$menuServices = [];

function recursiveGetServices($parent_id, $parent_rout) {

    $services = \app\models\Service::find()
        ->where(['status' => \app\models\Service::STATUS_ACTIVE])
        ->andWhere(['parent_id' => $parent_id])->all();
    $items = [];

    foreach($services as $service) {

        $childs = recursiveGetServices($service->id, $parent_rout . '/' . $service->slug);
        $items[] = [
            'label' => $service->name,
            'url' => $parent_rout . '/' . $service->slug,
            'items' => $childs,
            'linkOptions' => [
                'class' => (!empty($childs) ? 'caret-right' : ''),
                'data' => [
                    'toggle' => 'none',
                ]
            ]
        ];
    }

    return $items;
}
$menuServices = recursiveGetServices(null,'/service');


//$services = \app\models\Service::find()
//    ->where(['status' => \app\models\Service::STATUS_ACTIVE])
//    ->andWhere(['parent_id' => null])->all();
//foreach($services as $service) {
//    $menuServices[] = [
//        'label' => $service->name,
//        'url' => '/service/' . $service->slug,
//    ];
//}

?>

<header class="affix">

    <div class="navbar-before">
        <div class="container position-relative">
            <div class="navbar-before-left  hidden-xs"><?=Yii::$app->params['settings']['address_short']?></div>
            <div class="navbar-before-right"><?=Yii::$app->params['settings']['phone']?></div>

<!--            <button type="button" class="btn btn-top" data-toggle="modal" data-target="#w11">Записаться</button>-->

            <a class="btn btn-top  hidden-xs" href="#callbackwidget">Заказать звонок</a>

        </div>
    </div>

    <?php

    NavBar::begin([
        'id' => 'navbar-main',
        'brandLabel' => '<div class="logo-img"></div><div class="navbar-label">Наша<br>Стоматология</div>' ,
        'brandUrl' => '/',
        'options' => [
            'class' => ''
        ]
    ]);

    echo Nav::widget([
        'items' => [
            [
                'label' => 'Клиника',
                'url' => '/about',
                'linkOptions' => [
                    'data' => [
                        'toggle' => 'none',
                    ]
                ],
                'items' => [
//                    [
//                        'label' => 'О нас',
//                        'url' => '/about',
//                    ],
                    [
                        'label' => 'Оборудование',
                        'url' => '/equipment',
                    ],
                    [
                        'label' => 'Акции',
                        'url' => '/sales',
                    ],
                    [
                        'label' => 'Отзывы',
                        'url' => '/review',
                    ],
                    [
                        'label' => 'Примеры работ',
                        'url' => '/example',
                    ],
                    [
                        'label' => 'Блог',
                        'url' => '/blog',
                    ],
                ]
            ],
            [
                'label' => 'Услуги',
                'items' => $menuServices,
                'url' => '/service',
                'linkOptions' => [
                    'data' => [
                        'toggle' => 'none',
                    ]
                ]
            ],
            [
                'label' => 'Цены',
                'url' => '/prices',
            ],
            [
                'label' => 'Врачи',
                'url' => '/doctor',
            ],
            [
                'label' => 'Контакты',
                'url' => '/contacts',
            ],
        ],
        'options' => [
            'class' => 'navbar-nav top-menu'
        ],
    ]);

    NavBar::end();?>

</header>