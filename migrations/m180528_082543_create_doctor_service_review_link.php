<?php

use yii\db\Migration;

/**
 * Handles the creation of table `message`.
 */
class m180528_082543_create_doctor_service_review_link extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%service_review}}', [
            'service_id' => $this->integer(),
            'review_id' => $this->integer(),
        ]);
        $this->addPrimaryKey('pk-service_review','service_review',['service_id', 'review_id']);

        $this->createTable('{{%doctor_review}}', [
            'doctor_id' => $this->integer(),
            'review_id' => $this->integer(),
        ]);
        $this->addPrimaryKey('pk-doctor_review','doctor_review',['doctor_id', 'review_id']);

        $this->createTable('{{%doctor_service}}', [
            'service_id' => $this->integer(),
            'doctor_id' => $this->integer(),
        ]);
        $this->addPrimaryKey('pk-doctor_service','doctor_service',['service_id', 'doctor_id']);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%service_review}}');
        $this->dropTable('{{%doctor_review}}');
        $this->dropTable('{{%doctor_service}}');
    }
}
