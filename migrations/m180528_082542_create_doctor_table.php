<?php

use yii\db\Migration;

/**
 * Handles the creation of table `message`.
 */
class m180528_082542_create_doctor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%doctor}}', [
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

            'content2' => $this->text(),

            'position' => $this->string()->defaultValue(null), //  должность
            'specialization' => $this->string(), //  специализация
            'scientist' => $this->string(), //  ученая степерь
            'start_working' => $this->integer(),
            
            'main_on' => $this->smallInteger(),
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
