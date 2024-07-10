<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%enrollment}}`.
 */
class m240709_001723_create_enrollment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%enrollment}}', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'enrolled_at' => $this->integer()->notNull(),
            'dropped_at' => $this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'role' => $this->smallInteger()->notNull()->defaultValue(1),
        ]);

        // Creates index for column `course_id`
        $this->createIndex(
            '{{%idx-enrollment-course_id}}',
            '{{%enrollment}}',
            'course_id'
        );

        // Adds foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-enrollment-course_id}}',
            '{{%enrollment}}',
            'course_id',
            '{{%course}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `user_id`
        $this->createIndex(
            '{{%idx-enrollment-user_id}}',
            '{{%enrollment}}',
            'user_id'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-enrollment-user_id}}',
            '{{%enrollment}}',
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
            '{{%fk-enrollment-course_id}}',
            '{{%enrollment}}'
        );

        // Drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-enrollment-course_id}}',
            '{{%enrollment}}'
        );

        // Drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-enrollment-user_id}}',
            '{{%enrollment}}'
        );

        // Drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-enrollment-user_id}}',
            '{{%enrollment}}'
        );

        $this->dropTable('{{%enrollment}}');
    }
}
