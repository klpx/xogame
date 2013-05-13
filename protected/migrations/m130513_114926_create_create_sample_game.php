<?php

class m130513_114926_create_create_sample_game extends CDbMigration
{
	public function up()
	{
		$game = new Game();
		$game->playerX_id = 1;
		$game->playerO_id = 2;
		$game->current_player_id = 1;
		$game->save();
	}

	public function down()
	{
		echo "m130513_114926_create_create_sample_game does not support migration down.\n";
		return false;
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