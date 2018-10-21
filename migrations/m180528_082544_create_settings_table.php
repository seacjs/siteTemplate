<?php

use yii\db\Migration;

/**
 * Handles the creation of table `message`.
 */
class m180528_082544_create_settings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%settings}}', [
            'id' => $this->primaryKey(),

            'phone' => $this->string(),
            'second_phone' => $this->string(),

            'email' => $this->string(),
            'address' => $this->string(),
            'address_short' => $this->string(),
            'vk' => $this->string(),
            'facebook' => $this->string(),
            'instagram' => $this->string(),

            'work_time' => $this->string(),
            'work_days' => $this->string(),

            'map' => $this->string(1024),

            'about' => $this->text(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%settings}}');
    }
}
