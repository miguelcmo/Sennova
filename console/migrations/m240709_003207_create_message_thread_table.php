<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%message_thread}}`.
 */
class m240709_003207_create_message_thread_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%message_thread}}', [
            'id' => $this->primaryKey(),
            'subject' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `subject`
        $this->createIndex(
            '{{%idx-message_thread-subject}}',
            '{{%message_thread}}',
            'subject'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drops index for column `subject`
        $this->dropIndex(
            '{{%idx-message_thread-subject}}',
            '{{%message_thread}}'
        );

        $this->dropTable('{{%message_thread}}');
    }
}
