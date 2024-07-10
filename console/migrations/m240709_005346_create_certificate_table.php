<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%certificate}}`.
 */
class m240709_005346_create_certificate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%certificate}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'course_id' => $this->integer()->notNull(),
            'issued_at' => $this->integer()->notNull(),
            'file_id' => $this->integer()->notNull(),
        ]);

        // Creates index for column `user_id`
        $this->createIndex(
            '{{%idx-certificate-user_id}}',
            '{{%certificate}}',
            'user_id'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-certificate-user_id}}',
            '{{%certificate}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `course_id`
        $this->createIndex(
            '{{%idx-certificate-course_id}}',
            '{{%certificate}}',
            'course_id'
        );

        // Adds foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-certificate-course_id}}',
            '{{%certificate}}',
            'course_id',
            '{{%course}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `file_id`
        $this->createIndex(
            '{{%idx-certificate-file_id}}',
            '{{%certificate}}',
            'file_id'
        );

        // Adds foreign key for table `{{%file}}`
        $this->addForeignKey(
            '{{%fk-certificate-file_id}}',
            '{{%certificate}}',
            'file_id',
            '{{%file}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-certificate-user_id}}',
            '{{%certificate}}'
        );

        // Drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-certificate-user_id}}',
            '{{%certificate}}'
        );

        // Drops foreign key for table `{{%course}}`
        $this->dropForeignKey(
            '{{%fk-certificate-course_id}}',
            '{{%certificate}}'
        );

        // Drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-certificate-course_id}}',
            '{{%certificate}}'
        );

        // Drops foreign key for table `{{%file}}`
        $this->dropForeignKey(
            '{{%fk-certificate-file_id}}',
            '{{%certificate}}'
        );

        // Drops index for column `file_id`
        $this->dropIndex(
            '{{%idx-certificate-file_id}}',
            '{{%certificate}}'
        );

        $this->dropTable('{{%certificate}}');
    }
}
