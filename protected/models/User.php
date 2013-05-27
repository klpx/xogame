<?php

class User extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
	    return parent::model($className);
	}
	public function tableName () {
		return 'user';
	}

	public function waitCounter () {
		$userId = Yii::app()->user->id;
		$games = Game::model()->count('current_player_id =:userId and win_player_id is null', array(':userId'=>$userId));

		return $games;
	}	
}
