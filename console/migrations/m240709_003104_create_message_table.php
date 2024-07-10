<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%message}}`.
 */
class m240709_003104_create_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%message}}', [
            'id' => $this->primaryKey(),
            'from_user_id' => $this->integer()->notNull(),
            'to_user_id' => $this->integer()->notNull(),
            'subject' => $this->string()->notNull(),
            'body' => $this->text()->notNull(),
            'read_status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `from_user_id`
        $this->createIndex(
            '{{%idx-message-from_user_id}}',
            '{{%message}}',
            'from_user_id'
        );

        // Adds foreign key for table `{{%user}}` (assuming it's the same as the user table)
        $this->addForeignKey(
            '{{%fk-message-from_user_id}}',
            '{{%message}}',
            'from_user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `to_user_id`
        $this->createIndex(
            '{{%idx-message-to_user_id}}',
            '{{%message}}',
            'to_user_id'
        );

        // Adds foreign key for table `{{%user}}` (assuming it's the same as the user table)
        $this->addForeignKey(
            '{{%fk-message-to_user_id}}',
            '{{%message}}',
            'to_user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drops foreign key for column `from_user_id`
        $this->dropForeignKey(
            '{{%fk-message-from_user_id}}',
            '{{%message}}'
        );

        // Drops index for column `from_user_id`
        $this->dropIndex(
            '{{%idx-message-from_user_id}}',
            '{{%message}}'
        );

        // Drops foreign key for column `to_user_id`
        $this->dropForeignKey(
            '{{%fk-message-to_user_id}}',
            '{{%message}}'
        );

        // Drops index for column `to_user_id`
        $this->dropIndex(
            '{{%idx-message-to_user_id}}',
            '{{%message}}'
        );

        $this->dropTable('{{%message}}');
    }
}
