<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_role}}`.
 */
class m240708_221653_create_user_role_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_role}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'role_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_role-user_id}}',
            '{{%user_role}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-user_role-user_id}}',
            '{{%user_role}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `role_id`
        $this->createIndex(
            '{{%idx-user_role-role_id}}',
            '{{%user_role}}',
            'role_id'
        );

        // add foreign key for table `{{%role}}`
        $this->addForeignKey(
            '{{%fk-user_role-role_id}}',
            '{{%user_role}}',
            'role_id',
            '{{%role}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-user_role-user_id}}',
            '{{%user_role}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_role-user_id}}',
            '{{%user_role}}'
        );

        // drops foreign key for table `{{%role}}`
        $this->dropForeignKey(
            '{{%fk-user_role-role_id}}',
            '{{%user_role}}'
        );

        // drops index for column `role_id`
        $this->dropIndex(
            '{{%idx-user_role-role_id}}',
            '{{%user_role}}'
        );

        $this->dropTable('{{%user_role}}');
    }
}
