<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%assignment}}`.
 */
class m240708_225706_create_assignment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%assignment}}', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'due_date' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `course_id`
        $this->createIndex(
            '{{%idx-assignment-course_id}}',
            '{{%assignment}}',
            'course_id'
        );

        // Adds foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-assignment-course_id}}',
            '{{%assignment}}',
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
            '{{%fk-assignment-course_id}}',
            '{{%assignment}}'
        );

        // Drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-assignment-course_id}}',
            '{{%assignment}}'
        );

        $this->dropTable('{{%assignment}}');
    }
}
