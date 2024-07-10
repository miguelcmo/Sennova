<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%group}}`.
 */
class m240709_001851_create_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%group}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'created_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `created_by`
        $this->createIndex(
            '{{%idx-group-created_by}}',
            '{{%group}}',
            'created_by'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-group-created_by}}',
            '{{%group}}',
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
        // Drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-group-created_by}}',
            '{{%group}}'
        );

        // Drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-group-created_by}}',
            '{{%group}}'
        );

        $this->dropTable('{{%group}}');
    }
}
