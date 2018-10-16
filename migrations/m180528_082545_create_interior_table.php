<?php

use yii\db\Migration;

/**
 * Handles the creation of table `message`.
 */
class m180528_082545_create_interior_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%interior}}', [
            'id' => $this->primaryKey(),
        ]);



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%interior}}');
    }
}
