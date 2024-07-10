<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%discussion_topic}}`.
 */
class m240708_230042_create_discussion_topic_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%discussion_topic}}', [
            'id' => $this->primaryKey(),
            'forum_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text(),
            'created_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `forum_id`
        $this->createIndex(
            '{{%idx-discussion_topic-forum_id}}',
            '{{%discussion_topic}}',
            'forum_id'
        );

        // Adds foreign key for table `{{%discussion_forum}}`
        $this->addForeignKey(
            '{{%fk-discussion_topic-forum_id}}',
            '{{%discussion_topic}}',
            'forum_id',
            '{{%discussion_forum}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `created_by`
        $this->createIndex(
            '{{%idx-discussion_topic-created_by}}',
            '{{%discussion_topic}}',
            'created_by'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-discussion_topic-created_by}}',
            '{{%discussion_topic}}',
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
        // Drops foreign key for table `{{%discussion_forum}}`
        $this->dropForeignKey(
            '{{%fk-discussion_topic-forum_id}}',
            '{{%discussion_topic}}'
        );

        // Drops index for column `forum_id`
        $this->dropIndex(
            '{{%idx-discussion_topic-forum_id}}',
            '{{%discussion_topic}}'
        );

        // Drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-discussion_topic-created_by}}',
            '{{%discussion_topic}}'
        );

        // Drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-discussion_topic-created_by}}',
            '{{%discussion_topic}}'
        );

        $this->dropTable('{{%discussion_topic}}');
    }
}
