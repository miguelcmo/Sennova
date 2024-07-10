<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%audit_log}}`.
 */
class m240709_011152_create_audit_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%audit_log}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'action' => $this->string()->notNull(),
            'model' => $this->string()->notNull(),
            'model_id' => $this->integer()->notNull(),
            'field' => $this->string(),
            'from_value' => $this->text(),
            'to_value' => $this->text(),
            'created_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `user_id`
        $this->createIndex(
            '{{%idx-audit_log-user_id}}',
            '{{%audit_log}}',
            'user_id'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-audit_log-user_id}}',
            '{{%audit_log}}',
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
            '{{%fk-audit_log-user_id}}',
            '{{%audit_log}}'
        );

        // Drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-audit_log-user_id}}',
            '{{%audit_log}}'
        );

        $this->dropTable('{{%audit_log}}');
    }
}
