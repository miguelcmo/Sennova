<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notification}}`.
 */
class m240709_002144_create_notification_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%notification}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'type' => $this->smallInteger()->notNull(),
            'content' => $this->text()->notNull(),
            'read_status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `user_id`
        $this->createIndex(
            '{{%idx-notification-user_id}}',
            '{{%notification}}',
            'user_id'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-notification-user_id}}',
            '{{%notification}}',
            'user_id',
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
        // Drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-notification-user_id}}',
            '{{%notification}}'
        );

        // Drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-notification-user_id}}',
            '{{%notification}}'
        );

        $this->dropTable('{{%notification}}');
    }
}
