<?php

use yii\db\Migration;

class m180524_102133_add_user_admin extends Migration
{
    public function up()
    {
        $user = new \app\models\User();
        $user->username = 'admin';
        $user->email = 'test@test.ru';
        $user->setPassword('123');
        $user->save();
    }

    public function down()
    {

    }
}
