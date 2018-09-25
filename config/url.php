<?php

return [
//    'class' => 'codemix\localeurls\UrlManager',
//    'languages' => ['en', 'ru'],

    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [

        '/' => 'site/index',
        '/admin' => 'admin/default/index',



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