<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%grade_item}}`.
 */
class m240708_230247_create_grade_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%grade_item}}', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text(),
            'max_grade' => $this->decimal(5, 2)->defaultValue(100),
            'weight' => $this->decimal(5, 2)->defaultValue(1),
            'grade_type' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `course_id`
        $this->createIndex(
            '{{%idx-grade_item-course_id}}',
            '{{%grade_item}}',
            'course_id'
        );

        // Adds foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-grade_item-course_id}}',
            '{{%grade_item}}',
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
        // Drops foreign key for table `{{%course}}`
        $this->dropForeignKey(
            '{{%fk-grade_item-course_id}}',
            '{{%grade_item}}'
        );

        // Drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-grade_item-course_id}}',
            '{{%grade_item}}'
        );

        $this->dropTable('{{%grade_item}}');
    }
}
