<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%discussion_forum}}`.
 */
class m240708_225926_create_discussion_forum_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%discussion_forum}}', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'created_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `course_id`
        $this->createIndex(
            '{{%idx-discussion_forum-course_id}}',
            '{{%discussion_forum}}',
            'course_id'
        );

        // Adds foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-discussion_forum-course_id}}',
            '{{%discussion_forum}}',
            'course_id',
            '{{%course}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `created_by`
        $this->createIndex(
            '{{%idx-discussion_forum-created_by}}',
            '{{%discussion_forum}}',
            'created_by'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-discussion_forum-created_by}}',
            '{{%discussion_forum}}',
            'created_by',
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
            '{{%fk-discussion_forum-course_id}}',
            '{{%discussion_forum}}'
        );

        // Drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-discussion_forum-course_id}}',
            '{{%discussion_forum}}'
        );

        // Drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-discussion_forum-created_by}}',
            '{{%discussion_forum}}'
        );

        // Drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-discussion_forum-created_by}}',
            '{{%discussion_forum}}'
        );

        $this->dropTable('{{%discussion_forum}}');
    }
}
