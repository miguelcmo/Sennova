<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%system_setting}}`.
 */
class m240709_010125_create_system_setting_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%system_setting}}', [
            'id' => $this->primaryKey(),
            'key' => $this->string()->notNull()->unique(),
            'value' => $this->text()->notNull(),
            'description' => $this->text(),
            'type' => $this->string()->notNull()->defaultValue('string'),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%system_setting}}');
    }
}
