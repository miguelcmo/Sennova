<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%options}}`.
 */
class m240830_200416_create_options_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%options}}', [
            'id' => $this->primaryKey(),
            'question_id' => $this->integer()->notNull(),
            'option_text' => $this->string(255)->notNull(),
            'is_correct' => $this->boolean()->notNull()->defaultValue(false),
            'weight' => $this->integer()->defaultValue(0),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `question_id`
        $this->createIndex(
            '{{%idx-options-question_id}}',
            '{{%options}}',
            'question_id'
        );

        // add foreign key for table `{{%questions}}`
        $this->addForeignKey(
            '{{%fk-options-question_id}}',
            '{{%options}}',
            'question_id',
            '{{%questions}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%questions}}`
        $this->dropForeignKey(
            '{{%fk-options-question_id}}',
            '{{%options}}'
        );

        // drops index for column `question_id`
        $this->dropIndex(
            '{{%idx-options-question_id}}',
            '{{%options}}'
        );

        $this->dropTable('{{%options}}');
    }
}