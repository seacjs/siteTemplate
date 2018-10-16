<?php

use yii\db\Migration;

/**
 * Handles the creation of table `message`.
 */
class m180528_082547_create_price_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%price_category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'service_id' => $this->integer(),
            'description' => $this->string()
        ]);
        $this->addForeignKey('fk-price_category-service', 'price_category', 'service_id','service', 'id');

        $this->createTable('{{%price}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer()->defaultValue(null),
            'service_id' => $this->integer(),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),

            'name' => $this->string(),
            'description' => $this->string(),
            'info' => $this->string(),
            'price' => $this->string(),

            'display_variant' => $this->smallInteger(),
            'tags' => $this->string(),
            'efficiency' => $this->integer(),
            'speed' => $this->integer(),
            'aesthetics' => $this->integer(),

            'status' => $this->smallInteger()
        ]);

        $this->addForeignKey('fk-price-service', 'price', 'service_id','service', 'id');
        $this->addForeignKey('fk-price-category', 'price', 'category_id','price_category', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%price}}');
        $this->dropTable('{{%price_category}}');
    }
}
