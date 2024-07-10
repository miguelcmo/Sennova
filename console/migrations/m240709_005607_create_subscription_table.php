<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subscription}}`.
 */
class m240709_005607_create_subscription_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subscription}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'plan_id' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'start_date' => $this->integer()->notNull(),
            'end_date' => $this->integer()->notNull(),
            'payment_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `user_id`
        $this->createIndex(
            '{{%idx-subscription-user_id}}',
            '{{%subscription}}',
            'user_id'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-subscription-user_id}}',
            '{{%subscription}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `plan_id`
        $this->createIndex(
            '{{%idx-subscription-plan_id}}',
            '{{%subscription}}',
            'plan_id'
        );

        // Adds foreign key for table `{{%plan}}`
        $this->addForeignKey(
            '{{%fk-subscription-plan_id}}',
            '{{%subscription}}',
            'plan_id',
            '{{%plan}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `payment_id`
        $this->createIndex(
            '{{%idx-subscription-payment_id}}',
            '{{%subscription}}',
            'payment_id'
        );

        // Adds foreign key for table `{{%payment}}`
        $this->addForeignKey(
            '{{%fk-subscription-payment_id}}',
            '{{%subscription}}',
            'payment_id',
            '{{%payment}}',
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
            '{{%fk-subscription-user_id}}',
            '{{%subscription}}'
        );

        // Drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-subscription-user_id}}',
            '{{%subscription}}'
        );

        // Drops foreign key for table `{{%plan}}`
        $this->dropForeignKey(
            '{{%fk-subscription-plan_id}}',
            '{{%subscription}}'
        );

        // Drops index for column `plan_id`
        $this->dropIndex(
            '{{%idx-subscription-plan_id}}',
            '{{%subscription}}'
        );

        // Drops foreign key for table `{{%payment}}`
        $this->dropForeignKey(
            '{{%fk-subscription-payment_id}}',
            '{{%subscription}}'
        );

        // Drops index for column `payment_id`
        $this->dropIndex(
            '{{%idx-subscription-payment_id}}',
            '{{%subscription}}'
        );

        $this->dropTable('{{%subscription}}');
    }
}
