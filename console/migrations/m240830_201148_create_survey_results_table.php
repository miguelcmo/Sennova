<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%survey_results}}`.
 */
class m240830_201148_create_survey_results_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%survey_results}}', [
            'id' => $this->primaryKey(),
            'survey_id' => $this->integer()->notNull(),
            'respondent_id' => $this->integer()->notNull(),
            'total_score' => $this->decimal(5, 2)->notNull(),
            'status' => $this->string()->notNull(),
            'completed_at' => $this->timestamp()->null(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `survey_id`
        $this->createIndex(
            '{{%idx-survey_results-survey_id}}',
            '{{%survey_results}}',
            'survey_id'
        );

        // creates index for column `respondent_id`
        $this->createIndex(
            '{{%idx-survey_results-respondent_id}}',
            '{{%survey_results}}',
            'respondent_id'
        );

        // add foreign key for table `{{%surveys}}`
        $this->addForeignKey(
            '{{%fk-survey_results-survey_id}}',
            '{{%survey_results}}',
            'survey_id',
            '{{%surveys}}',
            'id',
            'CASCADE'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-survey_results-respondent_id}}',
            '{{%survey_results}}',
            'respondent_id',
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
        // drops foreign key for table `{{%surveys}}`
        $this->dropForeignKey(
            '{{%fk-survey_results-survey_id}}',
            '{{%survey_results}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-survey_results-respondent_id}}',
            '{{%survey_results}}'
        );

        // drops index for column `survey_id`
        $this->dropIndex(
            '{{%idx-survey_results-survey_id}}',
            '{{%survey_results}}'
        );

        // drops index for column `respondent_id`
        $this->dropIndex(
            '{{%idx-survey_results-respondent_id}}',
            '{{%survey_results}}'
        );

        $this->dropTable('{{%survey_results}}');
    }
}
