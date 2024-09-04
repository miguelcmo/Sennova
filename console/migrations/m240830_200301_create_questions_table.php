<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%questions}}`.
 */
class m240830_200301_create_questions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%questions}}', [
            'id' => $this->primaryKey(),
            'section_id' => $this->integer()->notNull(),
            'question_text' => $this->text()->notNull(),
            'question_type' => "ENUM('text', 'multiple_choice', 'checkbox', 'true_false', 'open') NOT NULL",
            'points' => $this->integer()->defaultValue(0),
            'hint' => $this->text(),
            'explanation' => $this->text(),
            'media_type' => "ENUM('image', 'video', 'none') NOT NULL DEFAULT 'none'",
            'media_url' => $this->string(255),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `section_id`
        $this->createIndex(
            '{{%idx-questions-section_id}}',
            '{{%questions}}',
            'section_id'
        );

        // add foreign key for table `{{%sections}}`
        $this->addForeignKey(
            '{{%fk-questions-section_id}}',
            '{{%questions}}',
            'section_id',
            '{{%sections}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%sections}}`
        $this->dropForeignKey(
            '{{%fk-questions-section_id}}',
            '{{%questions}}'
        );

        // drops index for column `section_id`
        $this->dropIndex(
            '{{%idx-questions-section_id}}',
            '{{%questions}}'
        );

        $this->dropTable('{{%questions}}');
    }
}
