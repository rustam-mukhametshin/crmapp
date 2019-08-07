<?php

use yii\db\Migration;

/**
 * Class m190807_021140_create_rbac_tables
 */
class m190807_021140_create_rbac_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute(
            file_get_contents(
                Yii::getAlias('@yii/rbac/migrations/schema-mysql.sql')
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190807_021140_create_rbac_tables cannot be reverted.\n";

        return false;
    }
}
