<?php

use yii\db\Migration;

/**
 * Handles the creation of table `message`.
 */
class m180528_082541_create_page_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%page}}', [
            'id' => $this->primaryKey(),

            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull(),

            'title' => $this->string(),
            'description' => $this->string(),
            'keywords' => $this->string(),
            'h1' => $this->string(),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),

            'content' => $this->text(),

            'status' => $this->smallInteger(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%page}}');
    }
}
