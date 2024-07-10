<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%grade}}`.
 */
class m240708_230520_create_grade_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%grade}}', [
            'id' => $this->primaryKey(),
            'grade_item_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'grade' => $this->decimal(5, 2)->notNull()->defaultValue(0),
            'comments' => $this->text(),
            'graded_by' => $this->integer(),
            'graded_at' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `grade_item_id`
        $this->createIndex(
            '{{%idx-grade-grade_item_id}}',
            '{{%grade}}',
            'grade_item_id'
        );

        // Adds foreign key for table `{{%grade_item}}`
        $this->addForeignKey(
            '{{%fk-grade-grade_item_id}}',
            '{{%grade}}',
            'grade_item_id',
            '{{%grade_item}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `user_id`
        $this->createIndex(
            '{{%idx-grade-user_id}}',
            '{{%grade}}',
            'user_id'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-grade-user_id}}',
            '{{%grade}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `graded_by`
        $this->createIndex(
            '{{%idx-grade-graded_by}}',
            '{{%grade}}',
            'graded_by'
        );

        // Adds foreign key for table `{{%user}}` (assuming it's the same as the user table)
        $this->addForeignKey(
            '{{%fk-grade-graded_by}}',
            '{{%grade}}',
            'graded_by',
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
        // Drops foreign key for table `{{%grade_item}}`
        $this->dropForeignKey(
            '{{%fk-grade-grade_item_id}}',
            '{{%grade}}'
        );

        // Drops index for column `grade_item_id`
        $this->dropIndex(
            '{{%idx-grade-grade_item_id}}',
            '{{%grade}}'
        );

        // Drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-grade-user_id}}',
            '{{%grade}}'
        );

        // Drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-grade-user_id}}',
            '{{%grade}}'
        );

        // Drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-grade-graded_by}}',
            '{{%grade}}'
        );

        // Drops index for column `graded_by`
        $this->dropIndex(
            '{{%idx-grade-graded_by}}',
            '{{%grade}}'
        );

        $this->dropTable('{{%grade}}');
    }
}
