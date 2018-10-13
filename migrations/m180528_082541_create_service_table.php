<?php

use yii\db\Migration;

/**
 * Handles the creation of table `message`.
 */
class m180528_082541_create_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%service}}', [
            'id' => $this->primaryKey(),

            /* basic */
            'title' => $this->string(),
            'description' => $this->string(),
            'keywords' => $this->string(),
            'h1' => $this->string(),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),

            'content' => $this->text(),
            'content_description' => $this->string(),
            'status' => $this->smallInteger(),

        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%service}}');
    }
}