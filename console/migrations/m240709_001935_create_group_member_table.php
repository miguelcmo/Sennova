<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%group_member}}`.
 */
class m240709_001935_create_group_member_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%group_member}}', [
            'id' => $this->primaryKey(),
            'group_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'role' => $this->smallInteger()->notNull()->defaultValue(1),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'joined_at' => $this->integer()->notNull(),
            'left_at' => $this->integer(),
        ]);

        // Creates index for column `group_id`
        $this->createIndex(
            '{{%idx-group_member-group_id}}',
            '{{%group_member}}',
            'group_id'
        );

        // Adds foreign key for table `{{%group}}`
        $this->addForeignKey(
            '{{%fk-group_member-group_id}}',
            '{{%group_member}}',
            'group_id',
            '{{%group}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `user_id`
        $this->createIndex(
            '{{%idx-group_member-user_id}}',
            '{{%group_member}}',
            'user_id'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-group_member-user_id}}',
            '{{%group_member}}',
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
        // Drops foreign key for table `{{%group}}`
        $this->dropForeignKey(
            '{{%fk-group_member-group_id}}',
            '{{%group_member}}'
        );

        // Drops index for column `group_id`
        $this->dropIndex(
            '{{%idx-group_member-group_id}}',
            '{{%group_member}}'
        );

        // Drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-group_member-user_id}}',
            '{{%group_member}}'
        );

        // Drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-group_member-user_id}}',
            '{{%group_member}}'
        );

        $this->dropTable('{{%group_member}}');
    }
}
