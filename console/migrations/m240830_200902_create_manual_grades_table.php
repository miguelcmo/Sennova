<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%manual_grades}}`.
 */
class m240830_200902_create_manual_grades_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%manual_grades}}', [
            'id' => $this->primaryKey(),
            'answer_id' => $this->integer()->notNull(),
            'reviewer_id' => $this->integer()->notNull(),
            'grade' => $this->integer()->notNull(),
            'comment' => $this->text()->null(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `answer_id`
        $this->createIndex(
            '{{%idx-manual_grades-answer_id}}',
            '{{%manual_grades}}',
            'answer_id'
        );

        // creates index for column `reviewer_id`
        $this->createIndex(
            '{{%idx-manual_grades-reviewer_id}}',
            '{{%manual_grades}}',
            'reviewer_id'
        );

        // add foreign key for table `{{%answers}}`
        $this->addForeignKey(
            '{{%fk-manual_grades-answer_id}}',
            '{{%manual_grades}}',
            'answer_id',
            '{{%answers}}',
            'id',
            'CASCADE'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-manual_grades-reviewer_id}}',
            '{{%manual_grades}}',
            'reviewer_id',
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
        // drops foreign key for table `{{%answers}}`
        $this->dropForeignKey(
            '{{%fk-manual_grades-answer_id}}',
            '{{%manual_grades}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-manual_grades-reviewer_id}}',
            '{{%manual_grades}}'
        );

        // drops index for column `answer_id`
        $this->dropIndex(
            '{{%idx-manual_grades-answer_id}}',
            '{{%manual_grades}}'
        );

        // drops index for column `reviewer_id`
        $this->dropIndex(
            '{{%idx-manual_grades-reviewer_id}}',
            '{{%manual_grades}}'
        );

        $this->dropTable('{{%manual_grades}}');
    }
}
