<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%quiz_grade}}`.
 */
class m240708_225157_create_quiz_grade_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%quiz_grade}}', [
            'id' => $this->primaryKey(),
            'quiz_attempt_id' => $this->integer()->notNull(),
            'quiz_question_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'chosen_option' => $this->integer()->notNull(),
            'is_correct' => $this->boolean()->defaultValue(false),
            'points' => $this->integer()->notNull()->defaultValue(0),
        ]);

        // Creates index for column `quiz_attempt_id`
        $this->createIndex(
            '{{%idx-quiz_grade-quiz_attempt_id}}',
            '{{%quiz_grade}}',
            'quiz_attempt_id'
        );

        // Adds foreign key for table `{{%quiz_attempt}}`
        $this->addForeignKey(
            '{{%fk-quiz_grade-quiz_attempt_id}}',
            '{{%quiz_grade}}',
            'quiz_attempt_id',
            '{{%quiz_attempt}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `quiz_question_id`
        $this->createIndex(
            '{{%idx-quiz_grade-quiz_question_id}}',
            '{{%quiz_grade}}',
            'quiz_question_id'
        );

        // Adds foreign key for table `{{%quiz_question}}`
        $this->addForeignKey(
            '{{%fk-quiz_grade-quiz_question_id}}',
            '{{%quiz_grade}}',
            'quiz_question_id',
            '{{%quiz_question}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `user_id`
        $this->createIndex(
            '{{%idx-quiz_grade-user_id}}',
            '{{%quiz_grade}}',
            'user_id'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-quiz_grade-user_id}}',
            '{{%quiz_grade}}',
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
        // Drops foreign key for table `{{%quiz_attempt}}`
        $this->dropForeignKey(
            '{{%fk-quiz_grade-quiz_attempt_id}}',
            '{{%quiz_grade}}'
        );

        // Drops index for column `quiz_attempt_id`
        $this->dropIndex(
            '{{%idx-quiz_grade-quiz_attempt_id}}',
            '{{%quiz_grade}}'
        );

        // Drops foreign key for table `{{%quiz_question}}`
        $this->dropForeignKey(
            '{{%fk-quiz_grade-quiz_question_id}}',
            '{{%quiz_grade}}'
        );

        // Drops index for column `quiz_question_id`
        $this->dropIndex(
            '{{%idx-quiz_grade-quiz_question_id}}',
            '{{%quiz_grade}}'
        );

        // Drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-quiz_grade-user_id}}',
            '{{%quiz_grade}}'
        );

        // Drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-quiz_grade-user_id}}',
            '{{%quiz_grade}}'
        );

        $this->dropTable('{{%quiz_grade}}');
    }
}
