<?php

use yii\db\Migration;

/**
 * Handles the creation of table `message`.
 */
class m180528_082546_create_example_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%example}}', [
            'id' => $this->primaryKey(),

            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),

            /* basic */
            'title' => $this->string(),
            'description' => $this->string(),
            'keywords' => $this->string(),
            'h1' => $this->string(),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),

            'content' => $this->text(),
            'status' => $this->smallInteger(),
        ]);

        $this->createTable('{{%example_service}}', [
            'service_id' => $this->integer(),
            'example_id' => $this->integer(),
        ]);
        $this->addPrimaryKey('pk-example_service','example_service',['service_id', 'example_id']);
        $this->addForeignKey('fk-example_service-service', '{{%example_service}}','service_id','{{%service}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-example_service-example', '{{%example_service}}','example_id','{{%example}}','id','CASCADE','CASCADE');

        $this->createTable('{{%example_review}}', [
            'example_id' => $this->integer(),
            'review_id' => $this->integer(),
        ]);
        $this->addPrimaryKey('pk-example_review','example_review',['example_id', 'review_id']);
        $this->addForeignKey('fk-example_review-example', '{{%example_review}}','example_id','{{%example}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-example_review-review', '{{%example_review}}','review_id','{{%review}}','id','CASCADE','CASCADE');

        $this->createTable('{{%example_doctor}}', [
            'example_id' => $this->integer(),
            'doctor_id' => $this->integer(),
        ]);
        $this->addPrimaryKey('pk-example_doctor','example_doctor',['example_id', 'doctor_id']);
        $this->addForeignKey('fk-example_doctor-example', '{{%example_doctor}}','example_id','{{%example}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-example_doctor-doctor', '{{%example_doctor}}','doctor_id','{{%doctor}}','id','CASCADE','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%example_doctor}}');
        $this->dropTable('{{%example_review}}');
        $this->dropTable('{{%example_service}}');
        $this->dropTable('{{%example}}');
    }
}
