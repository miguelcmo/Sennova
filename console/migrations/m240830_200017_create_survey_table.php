<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%surveys}}`.
 */
class m240830_200017_create_survey_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%survey}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'total_points' => $this->integer()->defaultValue(0),
            'created_by' => $this->integer()->notNull(),
            'status' => "ENUM('draft', 'published', 'archived') NOT NULL DEFAULT 'draft'",
            'url' => $this->string(255),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-survey-created_by}}',
            '{{%survey}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-survey-created_by}}',
            '{{%survey}}',
            'created_by',
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
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-survey-created_by}}',
            '{{%survey}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-survey-created_by}}',
            '{{%survey}}'
        );

        $this->dropTable('{{%survey}}');
    }
}
