<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course_feedback}}`.
 */
class m240709_005833_create_course_feedback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course_feedback}}', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'rating' => $this->integer()->notNull(),
            'feedback' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `course_id`
        $this->createIndex(
            '{{%idx-course_feedback-course_id}}',
            '{{%course_feedback}}',
            'course_id'
        );

        // Adds foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-course_feedback-course_id}}',
            '{{%course_feedback}}',
            'course_id',
            '{{%course}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `user_id`
        $this->createIndex(
            '{{%idx-course_feedback-user_id}}',
            '{{%course_feedback}}',
            'user_id'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-course_feedback-user_id}}',
            '{{%course_feedback}}',
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
        // Drops foreign key for table `{{%course}}`
        $this->dropForeignKey(
            '{{%fk-course_feedback-course_id}}',
            '{{%course_feedback}}'
        );

        // Drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-course_feedback-course_id}}',
            '{{%course_feedback}}'
        );

        // Drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-course_feedback-user_id}}',
            '{{%course_feedback}}'
        );

        // Drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-course_feedback-user_id}}',
            '{{%course_feedback}}'
        );

        $this->dropTable('{{%course_feedback}}');
    }
}
