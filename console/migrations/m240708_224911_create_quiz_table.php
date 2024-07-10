<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%quiz}}`.
 */
class m240708_224911_create_quiz_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%quiz}}', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'time_limit' => $this->integer()->defaultValue(null),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `course_id`
        $this->createIndex(
            '{{%idx-quiz-course_id}}',
            '{{%quiz}}',
            'course_id'
        );

        // Adds foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-quiz-course_id}}',
            '{{%quiz}}',
            'course_id',
            '{{%course}}',
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
            '{{%fk-quiz-course_id}}',
            '{{%quiz}}'
        );

        // Drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-quiz-course_id}}',
            '{{%quiz}}'
        );

        $this->dropTable('{{%quiz}}');
    }
}
