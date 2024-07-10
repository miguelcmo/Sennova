<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%calendar_event}}`.
 */
class m240709_004033_create_calendar_event_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%calendar_event}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'start_date' => $this->dateTime()->notNull(),
            'end_date' => $this->dateTime(),
            'all_day' => $this->boolean()->defaultValue(false),
            'location' => $this->string(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Indexes
        $this->createIndex(
            '{{%idx-calendar_event-start_date}}',
            '{{%calendar_event}}',
            'start_date'
        );

        $this->createIndex(
            '{{%idx-calendar_event-end_date}}',
            '{{%calendar_event}}',
            'end_date'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drops indexes
        $this->dropIndex(
            '{{%idx-calendar_event-start_date}}',
            '{{%calendar_event}}'
        );

        $this->dropIndex(
            '{{%idx-calendar_event-end_date}}',
            '{{%calendar_event}}'
        );

        $this->dropTable('{{%calendar_event}}');
    }
}
