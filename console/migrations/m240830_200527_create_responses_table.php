<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%responses}}`.
 */
class m240830_200527_create_responses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%responses}}', [
            'id' => $this->primaryKey(),
            'survey_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'question_id' => $this->integer()->notNull(),
            'option_id' => $this->integer(), // opcional, si aplica
            'response_text' => $this->text(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `survey_id`
        $this->createIndex(
            '{{%idx-responses-survey_id}}',
            '{{%responses}}',
            'survey_id'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-responses-user_id}}',
            '{{%responses}}',
            'user_id'
        );

        // creates index for column `question_id`
        $this->createIndex(
            '{{%idx-responses-question_id}}',
            '{{%responses}}',
            'question_id'
        );

        // creates index for column `option_id`
        $this->createIndex(
            '{{%idx-responses-option_id}}',
            '{{%responses}}',
            'option_id'
        );

        // add foreign key for table `{{%surveys}}`
        $this->addForeignKey(
            '{{%fk-responses-survey_id}}',
            '{{%responses}}',
            'survey_id',
            '{{%surveys}}',
            'id',
            'CASCADE'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-responses-user_id}}',
            '{{%responses}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // add foreign key for table `{{%questions}}`
        $this->addForeignKey(
            '{{%fk-responses-question_id}}',
            '{{%responses}}',
            'question_id',
            '{{%questions}}',
            'id',
            'CASCADE'
        );

        // add foreign key for table `{{%options}}` (opcional)
        $this->addForeignKey(
            '{{%fk-responses-option_id}}',
            '{{%responses}}',
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
        // drops foreign key for table `{{%surveys}}`
        $this->dropForeignKey(
            '{{%fk-responses-survey_id}}',
            '{{%responses}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-responses-user_id}}',
            '{{%responses}}'
        );

        // drops foreign key for table `{{%questions}}`
        $this->dropForeignKey(
            '{{%fk-responses-question_id}}',
            '{{%responses}}'
        );

        // drops foreign key for table `{{%options}}` (opcional)
        $this->dropForeignKey(
            '{{%fk-responses-option_id}}',
            '{{%responses}}'
        );

        // drops index for column `survey_id`
        $this->dropIndex(
            '{{%idx-responses-survey_id}}',
            '{{%responses}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-responses-user_id}}',
            '{{%responses}}'
        );

        // drops index for column `question_id`
        $this->dropIndex(
            '{{%idx-responses-question_id}}',
            '{{%responses}}'
        );

        // drops index for column `option_id`
        $this->dropIndex(
            '{{%idx-responses-option_id}}',
            '{{%responses}}'
        );

        $this->dropTable('{{%responses}}');
    }
}
