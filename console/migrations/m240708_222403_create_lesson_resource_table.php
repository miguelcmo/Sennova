<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lesson_resource}}`.
 */
class m240708_222403_create_lesson_resource_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lesson_resource}}', [
            'id' => $this->primaryKey(),
            'lesson_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'file_path' => $this->string(255)->notNull(),
            'type' => $this->string(50)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // creates index for column `lesson_id`
        $this->createIndex(
            '{{%idx-lesson_resource-lesson_id}}',
            '{{%lesson_resource}}',
            'lesson_id'
        );

        // add foreign key for table `{{%lesson}}`
        $this->addForeignKey(
            '{{%fk-lesson_resource-lesson_id}}',
            '{{%lesson_resource}}',
            'lesson_id',
            '{{%lesson}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%lesson}}`
        $this->dropForeignKey(
            '{{%fk-lesson_resource-lesson_id}}',
            '{{%lesson_resource}}'
        );

        // drops index for column `lesson_id`
        $this->dropIndex(
            '{{%idx-lesson_resource-lesson_id}}',
            '{{%lesson_resource}}'
        );

        $this->dropTable('{{%lesson_resource}}');
    }
}
