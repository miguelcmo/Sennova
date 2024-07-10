<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course_rating}}`.
 */
class m240709_005927_create_course_rating_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course_rating}}', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'rating' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `course_id`
        $this->createIndex(
            '{{%idx-course_rating-course_id}}',
            '{{%course_rating}}',
            'course_id'
        );

        // Adds foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-course_rating-course_id}}',
            '{{%course_rating}}',
            'course_id',
            '{{%course}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `user_id`
        $this->createIndex(
            '{{%idx-course_rating-user_id}}',
            '{{%course_rating}}',
            'user_id'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-course_rating-user_id}}',
            '{{%course_rating}}',
            'user_id',
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
        // Drops foreign key for table `{{%course}}`
        $this->dropForeignKey(
            '{{%fk-course_rating-course_id}}',
            '{{%course_rating}}'
        );

        // Drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-course_rating-course_id}}',
            '{{%course_rating}}'
        );

        // Drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-course_rating-user_id}}',
            '{{%course_rating}}'
        );

        // Drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-course_rating-user_id}}',
            '{{%course_rating}}'
        );

        $this->dropTable('{{%course_rating}}');
    }
}
