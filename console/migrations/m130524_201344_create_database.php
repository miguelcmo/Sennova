<?php

use yii\db\Migration;

/**
 * Class m130524_201344_create_database
 */
class m130524_201344_create_database extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $dbName = 'servisena';
        $charset = 'utf8';
        $collate = 'utf8_general_ci';

        $this->execute("CREATE DATABASE IF NOT EXISTS {$dbName} CHARACTER SET {$charset} COLLATE {$collate};");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $dbName = 'servisena';

        $this->execute("DROP DATABASE IF EXISTS {$dbName};");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240711_020018_create_database cannot be reverted.\n";

        return false;
    }
    */
}
