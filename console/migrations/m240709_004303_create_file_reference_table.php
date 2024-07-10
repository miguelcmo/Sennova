<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%file_reference}}`.
 */
class m240709_004303_create_file_reference_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%file_reference}}', [
            'id' => $this->primaryKey(),
            'file_id' => $this->integer()->notNull(),
            'model' => $this->string()->notNull(),
            'model_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `file_id`
        $this->createIndex(
            '{{%idx-file_reference-file_id}}',
            '{{%file_reference}}',
            'file_id'
        );

        // Adds foreign key for table `{{%file}}`
        $this->addForeignKey(
            '{{%fk-file_reference-file_id}}',
            '{{%file_reference}}',
            'file_id',
            '{{%file}}',
            'id',
            'CASCADE'
        );

        // Creates composite index for columns `model` and `model_id`
        $this->createIndex(
            '{{%idx-file_reference-model-model_id}}',
            '{{%file_reference}}',
            ['model', 'model_id']
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Drops foreign key for table `{{%file}}`
        $this->dropForeignKey(
            '{{%fk-file_reference-file_id}}',
            '{{%file_reference}}'
        );

        // Drops index for column `file_id`
        $this->dropIndex(
            '{{%idx-file_reference-file_id}}',
            '{{%file_reference}}'
        );

        // Drops composite index for columns `model` and `model_id`
        $this->dropIndex(
            '{{%idx-file_reference-model-model_id}}',
            '{{%file_reference}}'
        );

        $this->dropTable('{{%file_reference}}');
    }
}
