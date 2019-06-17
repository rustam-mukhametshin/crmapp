<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%phone}}`.
 */
class m190617_172638_create_phone_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%phone}}', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer()->unique(),
            'number' => $this->string(),
        ]);
        $this->addForeignKey(
            'customer_phone_numbers',
            '{{%phone}}',
            'customer_id',
            '{{%customer}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('customer_phone_numbers', '{{%phone}}');
        $this->dropTable('{{%phone}}');
    }
}
