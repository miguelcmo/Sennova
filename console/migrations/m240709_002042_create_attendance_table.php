<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%attendance}}`.
 */
class m240709_002042_create_attendance_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%attendance}}', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'date' => $this->date()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `course_id`
        $this->createIndex(
            '{{%idx-attendance-course_id}}',
            '{{%attendance}}',
            'course_id'
        );

        // Adds foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-attendance-course_id}}',
            '{{%attendance}}',
            'course_id',
            '{{%course}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `user_id`
        $this->createIndex(
            '{{%idx-attendance-user_id}}',
            '{{%attendance}}',
            'user_id'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-attendance-user_id}}',
            '{{%attendance}}',
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
            '{{%fk-attendance-course_id}}',
            '{{%attendance}}'
        );

        // Drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-attendance-course_id}}',
            '{{%attendance}}'
        );

        // Drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-attendance-user_id}}',
            '{{%attendance}}'
        );

        // Drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-attendance-user_id}}',
            '{{%attendance}}'
        );

        $this->dropTable('{{%attendance}}');
    }
}
