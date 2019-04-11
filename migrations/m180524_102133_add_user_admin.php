<?php

use yii\db\Migration;

class m180524_102133_add_user_admin extends Migration
{
    public function up()
    {

        // todo: add roles 
        $user = new \app\models\User();
        $user->username = 'dev'; // developer
        $user->email = 'dev@test.ru';
        $user->setPassword('123');
        $user->save();

        $user = new \app\models\User();
        $user->username = 'adw'; // super admin
        $user->email = 'adw@test.ru';
        $user->setPassword('123');
        $user->save();

        $user = new \app\models\User();
        $user->username = 'admin';
        $user->email = 'admin@test.ru';
        $user->setPassword('123');
        $user->save();

        $user = new \app\models\User();
        $user->username = 'front';
        $user->email = 'front@test.ru';
        $user->setPassword('123');
        $user->save();

        $user = new \app\models\User();
        $user->username = 'manager';
        $user->email = 'manager@test.ru';
        $user->setPassword('123');
        $user->save();

    }

    public function down()
    {

    }
}
