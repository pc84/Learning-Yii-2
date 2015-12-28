<?php

use yii\db\Schema;
use yii\db\Migration;

class m151228_094742_import_initial_data extends Migration
{
    public function up()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%tbl_users}}',['id'=>'2','username'=>'admin','password'=>'d033e22ae348aeb5660fc2140aec35850c4da997','first_name'=>'adminName','last_name'=>'adminLastName','address'=>'2421 SW','city'=>'Miami','state'=>'3','zip'=>'33155','access_token'=>'','password_reset_token'=>'']);
        $this->insert('{{%tbl_users}}',['id'=>'5','username'=>'user1','password'=>'d033e22ae348aeb5660fc2140aec35850c4da997','first_name'=>'1','last_name'=>'2','address'=>'3','city'=>'4','state'=>'1','zip'=>'12345','access_token'=>'','password_reset_token'=>'']);
        $this->insert('{{%tbl_users}}',['id'=>'6','username'=>'user2','password'=>'d033e22ae348aeb5660fc2140aec35850c4da997','first_name'=>'1','last_name'=>'2','address'=>'3','city'=>'4','state'=>'2','zip'=>'12345','access_token'=>'','password_reset_token'=>'']);
        $this->insert('{{%tbl_users}}',['id'=>'7','username'=>'user3','password'=>'d033e22ae348aeb5660fc2140aec35850c4da997','first_name'=>'1','last_name'=>'2','address'=>'3','city'=>'4','state'=>'4','zip'=>'54321','access_token'=>'','password_reset_token'=>'']);
        $this->insert('{{%tbl_users}}',['id'=>'8','username'=>'pedro','password'=>'d033e22ae348aeb5660fc2140aec35850c4da997','first_name'=>'pedro','last_name'=>'castineiras','address'=>'2421 sw','city'=>'Manhattan','state'=>'2','zip'=>'12354','access_token'=>'','password_reset_token'=>'']);
        $this->insert('{{%tbl_users}}',['id'=>'9','username'=>'user4','password'=>'d033e22ae348aeb5660fc2140aec35850c4da997','first_name'=>'q','last_name'=>'w','address'=>'e','city'=>'r','state'=>'1','zip'=>'33155','access_token'=>'','password_reset_token'=>'']);
        $this->insert('{{%tbl_users}}',['id'=>'10','username'=>'user5','password'=>'d033e22ae348aeb5660fc2140aec35850c4da997','first_name'=>'adf','last_name'=>'km','address'=>'km','city'=>'dfwef','state'=>'1','zip'=>'33155','access_token'=>'','password_reset_token'=>'']);
        $this->insert('{{%tbl_states}}',['id'=>'1','name'=>'FL','full_name'=>'Florida']);
        $this->insert('{{%tbl_states}}',['id'=>'2','name'=>'NY','full_name'=>'New York']);
        $this->insert('{{%tbl_states}}',['id'=>'3','name'=>'CA','full_name'=>'California']);
        $this->insert('{{%tbl_states}}',['id'=>'4','name'=>'CL','full_name'=>'Colorado']);
        $this->execute('SET foreign_key_checks = 1;');
    }

    public function down()
    {
       return false;
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
