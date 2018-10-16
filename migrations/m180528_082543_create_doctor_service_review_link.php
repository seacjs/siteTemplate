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
        $this->addForeignKey('fk-service_review-service', '{{%service_review}}','service_id','{{%service}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-service_review-review', '{{%service_review}}','review_id','{{%review}}','id','CASCADE','CASCADE');

        $this->createTable('{{%doctor_review}}', [
            'doctor_id' => $this->integer(),
            'review_id' => $this->integer(),
        ]);
        $this->addPrimaryKey('pk-doctor_review','doctor_review',['doctor_id', 'review_id']);
        $this->addForeignKey('fk-doctor_review-doctor', '{{%doctor_review}}','doctor_id','{{%doctor}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-doctor_review-review', '{{%doctor_review}}','review_id','{{%review}}','id','CASCADE','CASCADE');

        $this->createTable('{{%doctor_service}}', [
            'service_id' => $this->integer(),
            'doctor_id' => $this->integer(),
        ]);
        $this->addPrimaryKey('pk-doctor_service','doctor_service',['service_id', 'doctor_id']);
        $this->addForeignKey('fk-doctor_service-service', '{{%doctor_service}}','service_id','{{%service}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-doctor_service-doctor', '{{%doctor_service}}','doctor_id','{{%doctor}}','id','CASCADE','CASCADE');

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
