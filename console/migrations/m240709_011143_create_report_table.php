<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%report}}`.
 */
class m240709_011143_create_report_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%report}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'type' => $this->string()->notNull(),
            'description' => $this->text(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `user_id`
        $this->createIndex(
            '{{%idx-report-user_id}}',
            '{{%report}}',
            'user_id'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-report-user_id}}',
            '{{%report}}',
            'user_id',
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
        // Drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-report-user_id}}',
            '{{%report}}'
        );

        // Drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-report-user_id}}',
            '{{%report}}'
        );

        $this->dropTable('{{%report}}');
    }
}
