<?php

use yii\db\Migration;

/**
 * Handles the creation of table `message`.
 */
class m180528_082541_create_seo_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%seo}}', [
            'id' => $this->primaryKey(),

            /* basic */
            'title' => $this->string(),
            'description' => $this->string(),
            'keywords' => $this->string(),
            'h1' => $this->string(),

            /* social */



        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%seo}}');
    }
}
