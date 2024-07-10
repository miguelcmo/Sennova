<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course_module}}`.
 */
class m240708_222037_create_course_module_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course_module}}', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // creates index for column `course_id`
        $this->createIndex(
            '{{%idx-course_module-course_id}}',
            '{{%course_module}}',
            'course_id'
        );

        // add foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-course_module-course_id}}',
            '{{%course_module}}',
            'course_id',
            '{{%course}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%course}}`
        $this->dropForeignKey(
            '{{%fk-course_module-course_id}}',
            '{{%course_module}}'
        );

        // drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-course_module-course_id}}',
            '{{%course_module}}'
        );

        $this->dropTable('{{%course_module}}');
    }
}
