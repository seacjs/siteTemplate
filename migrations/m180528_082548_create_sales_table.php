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
            'service_id' => $this->integer(),

            'name' => $this->string(),
            'description' => $this->string(),
            'date_at' => $this->integer(),
            'date' => $this->string(),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),

            'status' => $this->smallInteger()
        ]);

        $this->addForeignKey('fk-sales-service_id', 'sales', 'service_id','service', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%sales}}');
    }
}
