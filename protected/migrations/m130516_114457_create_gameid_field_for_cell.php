<?php

class m130516_114457_create_gameid_field_for_cell extends CDbMigration
{
	public function up()
	{
		$this->addColumn('cell', 'game_id', 'integer');
	}

	public function down()
	{
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