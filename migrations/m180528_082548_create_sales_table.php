<?php

use yii\db\Migration;

/**
 * Handles the creation of table `message`.
 */
class m180528_082548_create_sales_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%sales}}', [
            'id' => $this->primaryKey(),

            'name' => $this->string(),
            'value' => $this->string(),
            'description' => $this->string(),
            'date_at' => $this->integer(),
            'date' => $this->string(),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),

            'status' => $this->smallInteger()
        ]);

        $this->createTable('{{%sales_service}}', [
            'service_id' => $this->integer(),
            'sales_id' => $this->integer(),
        ]);
        $this->addPrimaryKey('pk-sales_service','sales_service',['service_id', 'sales_id']);
        $this->addForeignKey('fk-sales_service-service', '{{%sales_service}}','service_id','{{%service}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-sales_service-sales', '{{%sales_service}}','sales_id','{{%sales}}','id','CASCADE','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sales}}');
    }
}
