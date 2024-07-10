<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%quiz_question}}`.
 */
class m240708_225004_create_quiz_question_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%quiz_question}}', [
            'id' => $this->primaryKey(),
            'quiz_id' => $this->integer()->notNull(),
            'question' => $this->text()->notNull(),
            'options' => $this->json()->notNull(),
            'correct_option' => $this->integer()->notNull(),
            'points' => $this->integer()->defaultValue(1),
            'sort_order' => $this->integer()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `quiz_id`
        $this->createIndex(
            '{{%idx-quiz_question-quiz_id}}',
            '{{%quiz_question}}',
            'quiz_id'
        );

        // Adds foreign key for table `{{%quiz}}`
        $this->addForeignKey(
            '{{%fk-quiz_question-quiz_id}}',
            '{{%quiz_question}}',
            'quiz_id',
            '{{%quiz}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drops foreign key for table `{{%quiz}}`
        $this->dropForeignKey(
            '{{%fk-quiz_question-quiz_id}}',
            '{{%quiz_question}}'
        );

        // Drops index for column `quiz_id`
        $this->dropIndex(
            '{{%idx-quiz_question-quiz_id}}',
            '{{%quiz_question}}'
        );

        $this->dropTable('{{%quiz_question}}');
    }
}
