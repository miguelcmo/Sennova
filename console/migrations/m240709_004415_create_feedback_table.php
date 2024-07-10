<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%feedback}}`.
 */
class m240709_004415_create_feedback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%feedback}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'type' => $this->smallInteger()->notNull(),
            'content' => $this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `user_id`
        $this->createIndex(
            '{{%idx-feedback-user_id}}',
            '{{%feedback}}',
            'user_id'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-feedback-user_id}}',
            '{{%feedback}}',
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
            '{{%fk-feedback-user_id}}',
            '{{%feedback}}'
        );

        // Drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-feedback-user_id}}',
            '{{%feedback}}'
        );

        $this->dropTable('{{%feedback}}');
    }
}
