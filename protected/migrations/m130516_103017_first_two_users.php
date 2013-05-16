<?php

class m130516_103017_first_two_users extends CDbMigration
{
	public function safeUp()
	{
		$user = new User;
		$user->name = 'foo';
		$user->password = sha1('pass');
		$user->wins = 0;
		$user->fails = 0;
		$user->save();

		$user = new User;
		$user->name = 'bar';
		$user->password = sha1('pass');
		$user->wins = 0;
		$user->fails = 0;
		$user->save();
	}

	public function safeDown()
	{
	}
}