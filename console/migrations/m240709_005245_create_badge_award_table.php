<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%badge_award}}`.
 */
class m240709_005245_create_badge_award_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%badge_award}}', [
            'id' => $this->primaryKey(),
            'badge_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'awarded_at' => $this->integer()->notNull(),
        ]);

        // Creates index for column `badge_id`
        $this->createIndex(
            '{{%idx-badge_award-badge_id}}',
            '{{%badge_award}}',
            'badge_id'
        );

        // Adds foreign key for table `{{%badge}}`
        $this->addForeignKey(
            '{{%fk-badge_award-badge_id}}',
            '{{%badge_award}}',
            'badge_id',
            '{{%badge}}',
            'id',
            'CASCADE'
        );

        // Creates index for column `user_id`
        $this->createIndex(
            '{{%idx-badge_award-user_id}}',
            '{{%badge_award}}',
            'user_id'
        );

        // Adds foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-badge_award-user_id}}',
            '{{%badge_award}}',
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
        // Drops foreign key for table `{{%badge}}`
        $this->dropForeignKey(
            '{{%fk-badge_award-badge_id}}',
            '{{%badge_award}}'
        );

        // Drops index for column `badge_id`
        $this->dropIndex(
            '{{%idx-badge_award-badge_id}}',
            '{{%badge_award}}'
        );

        // Drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-badge_award-user_id}}',
            '{{%badge_award}}'
        );

        // Drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-badge_award-user_id}}',
            '{{%badge_award}}'
        );

        $this->dropTable('{{%badge_award}}');
    }
}
