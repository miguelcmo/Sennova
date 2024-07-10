<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%file}}`.
 */
class m240709_004132_create_file_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%file}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'path' => $this->string()->notNull(),
            'type' => $this->string(),
            'size' => $this->integer(),
            'uploaded_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `uploaded_by`
        $this->createIndex(
            '{{%idx-file-uploaded_by}}',
            '{{%file}}',
            'uploaded_by'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-file-uploaded_by}}',
            '{{%file}}',
            'uploaded_by',
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
            '{{%fk-file-uploaded_by}}',
            '{{%file}}'
        );

        // Drops index for column `uploaded_by`
        $this->dropIndex(
            '{{%idx-file-uploaded_by}}',
            '{{%file}}'
        );

        $this->dropTable('{{%file}}');
    }
}
