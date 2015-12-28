<?php

use yii\db\Schema;
use yii\db\Migration;

class m151228_094450_create_structure extends Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";

        if (!in_array('tbl_users', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%tbl_users}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY ("id")',
                    'username' => 'VARCHAR(20) NOT NULL',
                    'password' => 'VARCHAR(100) NOT NULL',
                    'first_name' => 'VARCHAR(30) NOT NULL',
                    'last_name' => 'VARCHAR(40) NOT NULL',
                    'address' => 'VARCHAR(80) NOT NULL',
                    'city' => 'VARCHAR(20) NOT NULL',
                    'state' => 'VARCHAR(20) NOT NULL',
                    'zip' => 'INT(8) NOT NULL',
                    'access_token' => 'VARCHAR(100) NOT NULL',
                    'password_reset_token' => 'VARCHAR(100) NOT NULL',
                ], $tableOptions_mysql);
            }
        }


        if (!in_array('tbl_states', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%tbl_states}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY ("id")',
                    'name' => 'VARCHAR(3) NOT NULL',
                    'full_name' => 'VARCHAR(20) NOT NULL',
                ], $tableOptions_mysql);
            }
        }


        $this->createIndex('idx_UNIQUE_username_1423_00','tbl_users','username',1);
        $this->createIndex('idx_id_1423_01','tbl_users','id',0);
    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS "tbl_users"');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS "tbl_states"');
        $this->execute('SET foreign_key_checks = 1;');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
