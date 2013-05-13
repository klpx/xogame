<?php

class m130513_110132_usertable extends CDbMigration
{
	public function up()
	{
		$this->createTable('user',array(
			'id'=>'pk',
			'name'=>'string',
			'password'=>'string',
			'wins'=>'integer',
			'fails'=>'integer'
			));
	}

	public function down()
	{
		$this->dropTable('user');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}