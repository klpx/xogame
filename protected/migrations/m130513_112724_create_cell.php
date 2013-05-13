<?php

class m130513_112724_create_cell extends CDbMigration
{
	public function up()
	{
	$this->createTable('cell',array(
		'id'=>'pk',
		'X'=>'integer',
		'Y'=>'integer',
		'content'=>'string',
		));
	}

	public function down()
	{
		$this->dropTable('cell');
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