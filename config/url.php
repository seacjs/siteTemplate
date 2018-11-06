<?php

return [
//    'class' => 'codemix\localeurls\UrlManager',
//    'languages' => ['en', 'ru'],

    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [

        '/' => 'site/index',
        '/admin' => 'admin/default/index',

        'prices' => 'site/prices',
        'contacts' => 'site/contacts',
        'about' => 'site/about',
        'sales' => 'site/sales',

        '/blog' => 'blog/index',
        '/blog/<slug>' => 'blog/view',

        '/example' => 'example/index',
        '/example/<slug>' => 'example/view',


        '/service' => 'service/index',
        '/service/<slug>' => 'service/view',
        '/service/<slug>/<childslug>' => 'service/view',
        '/service/<slug>/<childslug>/<childslug2>' => 'service/view',
        '/service/<slug>/<childslug>/<childslug2>/<childslug3>' => 'service/view',

        '/doctor' => 'doctor/index',
        '/doctor/<slug>' => 'doctor/view',

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