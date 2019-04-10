<?php

$localhost = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=DB_NAME', // 192.168.83.137 localhost
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];

$timeweb = [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=cl60511_stoma',
    'username' => 'cl60511_stoma',
    'password' => 'cl60511_stoma',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];

return $localhost;