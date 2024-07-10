<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%announcement}}`.
 */
class m240709_005720_create_announcement_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%announcement}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'type' => $this->smallInteger()->notNull()->defaultValue(0),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_by' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `created_by`
        $this->createIndex(
            '{{%idx-announcement-created_by}}',
            '{{%announcement}}',
            'created_by'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-announcement-created_by}}',
            '{{%announcement}}',
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
            '{{%fk-announcement-created_by}}',
            '{{%announcement}}'
        );

        // Drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-announcement-created_by}}',
            '{{%announcement}}'
        );

        $this->dropTable('{{%announcement}}');
    }
}
