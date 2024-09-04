<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%answers}}`.
 */
class m240830_200652_create_answers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%answers}}', [
            'id' => $this->primaryKey(),
            'response_id' => $this->integer()->notNull(),
            'question_id' => $this->integer()->notNull(),
            'option_id' => $this->integer(), // opcional, si aplica
            'answer_text' => $this->text(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `response_id`
        $this->createIndex(
            '{{%idx-answers-response_id}}',
            '{{%answers}}',
            'response_id'
        );

        // creates index for column `question_id`
        $this->createIndex(
            '{{%idx-answers-question_id}}',
            '{{%answers}}',
            'question_id'
        );

        // creates index for column `option_id`
        $this->createIndex(
            '{{%idx-answers-option_id}}',
            '{{%answers}}',
            'option_id'
        );

        // add foreign key for table `{{%responses}}`
        $this->addForeignKey(
            '{{%fk-answers-response_id}}',
            '{{%answers}}',
            'response_id',
            '{{%responses}}',
            'id',
            'CASCADE'
        );

        // add foreign key for table `{{%questions}}`
        $this->addForeignKey(
            '{{%fk-answers-question_id}}',
            '{{%answers}}',
            'question_id',
            '{{%questions}}',
            'id',
            'CASCADE'
        );

        // add foreign key for table `{{%options}}` (opcional)
        $this->addForeignKey(
            '{{%fk-answers-option_id}}',
            '{{%answers}}',
            'option_id',
            '{{%options}}',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%responses}}`
        $this->dropForeignKey(
            '{{%fk-answers-response_id}}',
            '{{%answers}}'
        );

        // drops foreign key for table `{{%questions}}`
        $this->dropForeignKey(
            '{{%fk-answers-question_id}}',
            '{{%answers}}'
        );

        // drops foreign key for table `{{%options}}` (opcional)
        $this->dropForeignKey(
            '{{%fk-answers-option_id}}',
            '{{%answers}}'
        );

        // drops index for column `response_id`
        $this->dropIndex(
            '{{%idx-answers-response_id}}',
            '{{%answers}}'
        );

        // drops index for column `question_id`
        $this->dropIndex(
            '{{%idx-answers-question_id}}',
            '{{%answers}}'
        );

        // drops index for column `option_id`
        $this->dropIndex(
            '{{%idx-answers-option_id}}',
            '{{%answers}}'
        );

        $this->dropTable('{{%answers}}');
    }
}
