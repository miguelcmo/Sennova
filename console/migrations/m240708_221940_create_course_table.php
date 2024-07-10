<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course}}`.
 */
class m240708_221940_create_course_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'category_id' => $this->integer()->notNull(),
            'instructor_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-course-category_id}}',
            '{{%course}}',
            'category_id'
        );

        // add foreign key for table `{{%course_category}}`
        $this->addForeignKey(
            '{{%fk-course-category_id}}',
            '{{%course}}',
            'category_id',
            '{{%course_category}}',
            'id',
            'CASCADE'
        );

        // creates index for column `instructor_id`
        $this->createIndex(
            '{{%idx-course-instructor_id}}',
            '{{%course}}',
            'instructor_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-course-instructor_id}}',
            '{{%course}}',
            'instructor_id',
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
        // drops foreign key for table `{{%course_category}}`
        $this->dropForeignKey(
            '{{%fk-course-category_id}}',
            '{{%course}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-course-category_id}}',
            '{{%course}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-course-instructor_id}}',
            '{{%course}}'
        );

        // drops index for column `instructor_id`
        $this->dropIndex(
            '{{%idx-course-instructor_id}}',
            '{{%course}}'
        );

        $this->dropTable('{{%course}}');
    }
}
