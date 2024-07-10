<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course_completion}}`.
 */
class m240708_222150_create_course_completion_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course_completion}}', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'completed_at' => $this->integer()->notNull(),
        ]);

        // creates index for column `course_id`
        $this->createIndex(
            '{{%idx-course_completion-course_id}}',
            '{{%course_completion}}',
            'course_id'
        );

        // add foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-course_completion-course_id}}',
            '{{%course_completion}}',
            'course_id',
            '{{%course}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-course_completion-user_id}}',
            '{{%course_completion}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-course_completion-user_id}}',
            '{{%course_completion}}',
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
        // drops foreign key for table `{{%course}}`
        $this->dropForeignKey(
            '{{%fk-course_completion-course_id}}',
            '{{%course_completion}}'
        );

        // drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-course_completion-course_id}}',
            '{{%course_completion}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-course_completion-user_id}}',
            '{{%course_completion}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-course_completion-user_id}}',
            '{{%course_completion}}'
        );

        $this->dropTable('{{%course_completion}}');
    }
}
