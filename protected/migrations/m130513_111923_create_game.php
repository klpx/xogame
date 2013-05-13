<?php

class m130513_111923_create_game extends CDbMigration
{
	public function up()
	{
		$this->createTable('game',array(
			'id'=>'pk',
			'playerX_id'=>'integer',
			'playerO_id'=>'integer',
			'current_player_id'=>'integer',
			'win_player_id'=>'integer'
			));
	}

	public function down()
	{
		$this->dropTable('game');
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