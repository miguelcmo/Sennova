<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%discussion_post}}`.
 */
class m240708_230139_create_discussion_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%discussion_post}}', [
            'id' => $this->primaryKey(),
            'topic_id' => $this->integer()->notNull(),
            'content' => $this->text(),
            'created_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `topic_id`
        $this->createIndex(
            '{{%idx-discussion_post-topic_id}}',
            '{{%discussion_post}}',
            'topic_id'
        );

        // Adds foreign key for table `{{%discussion_topic}}`
        $this->addForeignKey(
            '{{%fk-discussion_post-topic_id}}',
            '{{%discussion_post}}',
            'topic_id',
            '{{%discussion_topic}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `created_by`
        $this->createIndex(
            '{{%idx-discussion_post-created_by}}',
            '{{%discussion_post}}',
            'created_by'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-discussion_post-created_by}}',
            '{{%discussion_post}}',
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
        // Drops foreign key for table `{{%discussion_topic}}`
        $this->dropForeignKey(
            '{{%fk-discussion_post-topic_id}}',
            '{{%discussion_post}}'
        );

        // Drops index for column `topic_id`
        $this->dropIndex(
            '{{%idx-discussion_post-topic_id}}',
            '{{%discussion_post}}'
        );

        // Drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-discussion_post-created_by}}',
            '{{%discussion_post}}'
        );

        // Drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-discussion_post-created_by}}',
            '{{%discussion_post}}'
        );

        $this->dropTable('{{%discussion_post}}');
    }
}
