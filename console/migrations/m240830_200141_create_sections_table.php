<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sections}}`.
 */
class m240830_200141_create_sections_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sections}}', [
            'id' => $this->primaryKey(),
            'survey_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'order' => $this->integer()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `survey_id`
        $this->createIndex(
            '{{%idx-sections-survey_id}}',
            '{{%sections}}',
            'survey_id'
        );

        // add foreign key for table `{{%surveys}}`
        $this->addForeignKey(
            '{{%fk-sections-survey_id}}',
            '{{%sections}}',
            'survey_id',
            '{{%surveys}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%surveys}}`
        $this->dropForeignKey(
            '{{%fk-sections-survey_id}}',
            '{{%sections}}'
        );

        // drops index for column `survey_id`
        $this->dropIndex(
            '{{%idx-sections-survey_id}}',
            '{{%sections}}'
        );

        $this->dropTable('{{%sections}}');
    }
}
