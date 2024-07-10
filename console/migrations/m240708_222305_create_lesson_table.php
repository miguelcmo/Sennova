<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lesson}}`.
 */
class m240708_222305_create_lesson_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lesson}}', [
            'id' => $this->primaryKey(),
            'course_module_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text(),
            'video_url' => $this->string(255),
            'attachment' => $this->string(255),
            'sort_order' => $this->integer()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // creates index for column `course_module_id`
        $this->createIndex(
            '{{%idx-lesson-course_module_id}}',
            '{{%lesson}}',
            'course_module_id'
        );

        // add foreign key for table `{{%course_module}}`
        $this->addForeignKey(
            '{{%fk-lesson-course_module_id}}',
            '{{%lesson}}',
            'course_module_id',
            '{{%course_module}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%course_module}}`
        $this->dropForeignKey(
            '{{%fk-lesson-course_module_id}}',
            '{{%lesson}}'
        );

        // drops index for column `course_module_id`
        $this->dropIndex(
            '{{%idx-lesson-course_module_id}}',
            '{{%lesson}}'
        );

        $this->dropTable('{{%lesson}}');
    }
}
