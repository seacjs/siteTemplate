<?php

return [
    // to multi cities
//    'class' => 'app\components\CityUrlManager',
//    'languages' => ['en', 'ru'],

    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [

        '/' => 'site/index',
        '/admin' => 'admin/default/index',

        '/test' => 'test/index',


//        'prices' => 'site/prices',
//        'contacts' => 'site/contacts',
//        'about' => 'site/about',
//
//        '/blog' => 'blog/index',
//        '/blog/<slug>' => 'blog/view',
//
//        '/service' => 'service/index',
//        '/service/<slug>' => 'service/view',

        /* admin */
        [
            'pattern' => '<module>/<controller>/<action>',
            'route' => '<module>/<controller>/<action>',
        ],
        [
            'pattern' => '<module>/<controller>/<action>/<id:\d+>',
            'route' => '<module>/<controller>/<action>',
        ],

           /* site */
        [
            'pattern' => '<controller>/<action>/<id:\S+>',
            'route' => '<controller>/<action>',
        ],
        [
            'pattern' => '<controller>/<action>',
            'route' => '<controller>/<action>',
            'defaults' => [
                'action' => 'index',
            ],
        ],

    ],
];