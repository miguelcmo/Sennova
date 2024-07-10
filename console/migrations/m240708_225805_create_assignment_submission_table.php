<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%assignment_submission}}`.
 */
class m240708_225805_create_assignment_submission_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%assignment_submission}}', [
            'id' => $this->primaryKey(),
            'assignment_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'submitted_at' => $this->integer()->notNull(),
            'file_path' => $this->string(255),
            'grade' => $this->integer(),
            'comments' => $this->text(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `assignment_id`
        $this->createIndex(
            '{{%idx-assignment_submission-assignment_id}}',
            '{{%assignment_submission}}',
            'assignment_id'
        );

        // Adds foreign key for table `{{%assignment}}`
        $this->addForeignKey(
            '{{%fk-assignment_submission-assignment_id}}',
            '{{%assignment_submission}}',
            'assignment_id',
            '{{%assignment}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `user_id`
        $this->createIndex(
            '{{%idx-assignment_submission-user_id}}',
            '{{%assignment_submission}}',
            'user_id'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-assignment_submission-user_id}}',
            '{{%assignment_submission}}',
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
        // Drops foreign key for table `{{%assignment}}`
        $this->dropForeignKey(
            '{{%fk-assignment_submission-assignment_id}}',
            '{{%assignment_submission}}'
        );

        // Drops index for column `assignment_id`
        $this->dropIndex(
            '{{%idx-assignment_submission-assignment_id}}',
            '{{%assignment_submission}}'
        );

        // Drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-assignment_submission-user_id}}',
            '{{%assignment_submission}}'
        );

        // Drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-assignment_submission-user_id}}',
            '{{%assignment_submission}}'
        );

        $this->dropTable('{{%assignment_submission}}');
    }
}
