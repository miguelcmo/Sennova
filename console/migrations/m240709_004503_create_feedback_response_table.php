<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%feedback_response}}`.
 */
class m240709_004503_create_feedback_response_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%feedback_response}}', [
            'id' => $this->primaryKey(),
            'feedback_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'response' => $this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `feedback_id`
        $this->createIndex(
            '{{%idx-feedback_response-feedback_id}}',
            '{{%feedback_response}}',
            'feedback_id'
        );

        // Adds foreign key for table `{{%feedback}}`
        $this->addForeignKey(
            '{{%fk-feedback_response-feedback_id}}',
            '{{%feedback_response}}',
            'feedback_id',
            '{{%feedback}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `user_id`
        $this->createIndex(
            '{{%idx-feedback_response-user_id}}',
            '{{%feedback_response}}',
            'user_id'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-feedback_response-user_id}}',
            '{{%feedback_response}}',
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
        // Drops foreign key for table `{{%feedback}}`
        $this->dropForeignKey(
            '{{%fk-feedback_response-feedback_id}}',
            '{{%feedback_response}}'
        );

        // Drops index for column `feedback_id`
        $this->dropIndex(
            '{{%idx-feedback_response-feedback_id}}',
            '{{%feedback_response}}'
        );

        // Drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-feedback_response-user_id}}',
            '{{%feedback_response}}'
        );

        // Drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-feedback_response-user_id}}',
            '{{%feedback_response}}'
        );

        $this->dropTable('{{%feedback_response}}');
    }
}
