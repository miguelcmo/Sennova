<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%gradebook}}`.
 */
class m240708_230434_create_gradebook_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%gradebook}}', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'item_id' => $this->integer()->notNull(),
            'grade' => $this->decimal(5, 2)->defaultValue(0),
            'comments' => $this->text(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `course_id`
        $this->createIndex(
            '{{%idx-gradebook-course_id}}',
            '{{%gradebook}}',
            'course_id'
        );

        // Adds foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-gradebook-course_id}}',
            '{{%gradebook}}',
            'course_id',
            '{{%course}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `user_id`
        $this->createIndex(
            '{{%idx-gradebook-user_id}}',
            '{{%gradebook}}',
            'user_id'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-gradebook-user_id}}',
            '{{%gradebook}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `item_id`
        $this->createIndex(
            '{{%idx-gradebook-item_id}}',
            '{{%gradebook}}',
            'item_id'
        );

        // Adds foreign key for table `{{%grade_item}}`
        $this->addForeignKey(
            '{{%fk-gradebook-item_id}}',
            '{{%gradebook}}',
            'item_id',
            '{{%grade_item}}',
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
            '{{%fk-gradebook-course_id}}',
            '{{%gradebook}}'
        );

        // Drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-gradebook-course_id}}',
            '{{%gradebook}}'
        );

        // Drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-gradebook-user_id}}',
            '{{%gradebook}}'
        );

        // Drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-gradebook-user_id}}',
            '{{%gradebook}}'
        );

        // Drops index for column `item_id`
        $this->dropIndex(
            '{{%idx-gradebook-item_id}}',
            '{{%gradebook}}'
        );

        // Drops the table `{{%gradebook}}`
        $this->dropTable('{{%gradebook}}');
    }
}
