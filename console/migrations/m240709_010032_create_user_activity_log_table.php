<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_activity_log}}`.
 */
class m240709_010032_create_user_activity_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_activity_log}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'action' => $this->string()->notNull(),
            'description' => $this->text(),
            'created_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_activity_log-user_id}}',
            '{{%user_activity_log}}',
            'user_id'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_activity_log-user_id}}',
            '{{%user_activity_log}}',
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
            '{{%fk-user_activity_log-user_id}}',
            '{{%user_activity_log}}'
        );

        // Drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_activity_log-user_id}}',
            '{{%user_activity_log}}'
        );

        $this->dropTable('{{%user_activity_log}}');
    }
}
