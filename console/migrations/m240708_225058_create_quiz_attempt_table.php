<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%quiz_attempt}}`.
 */
class m240708_225058_create_quiz_attempt_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%quiz_attempt}}', [
            'id' => $this->primaryKey(),
            'quiz_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'started_at' => $this->integer()->notNull(),
            'finished_at' => $this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'score' => $this->integer(),
            'is_passed' => $this->boolean()->defaultValue(false),
        ]);

        // Creates index for column `quiz_id`
        $this->createIndex(
            '{{%idx-quiz_attempt-quiz_id}}',
            '{{%quiz_attempt}}',
            'quiz_id'
        );

        // Adds foreign key for table `{{%quiz}}`
        $this->addForeignKey(
            '{{%fk-quiz_attempt-quiz_id}}',
            '{{%quiz_attempt}}',
            'quiz_id',
            '{{%quiz}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `user_id`
        $this->createIndex(
            '{{%idx-quiz_attempt-user_id}}',
            '{{%quiz_attempt}}',
            'user_id'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-quiz_attempt-user_id}}',
            '{{%quiz_attempt}}',
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
        // Drops foreign key for table `{{%quiz}}`
        $this->dropForeignKey(
            '{{%fk-quiz_attempt-quiz_id}}',
            '{{%quiz_attempt}}'
        );

        // Drops index for column `quiz_id`
        $this->dropIndex(
            '{{%idx-quiz_attempt-quiz_id}}',
            '{{%quiz_attempt}}'
        );

        // Drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-quiz_attempt-user_id}}',
            '{{%quiz_attempt}}'
        );

        // Drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-quiz_attempt-user_id}}',
            '{{%quiz_attempt}}'
        );

        $this->dropTable('{{%quiz_attempt}}');
    }
}
