<?php

class Game extends CActiveRecord {
	public static function model($className=__CLASS__)
	{
	    return parent::model($className);
	}
	 
	public function tableName()
	{
	    return 'game';
	}

	public function relations ()
	{
		return array(
			'cells' => array(self::HAS_MANY, 'Cell', 'game_id'),
			'playerX' => array(self::HAS_ONE, 'User', 'playerX_id'),
			'playerO' => array(self::HAS_ONE, 'User', 'playerO_id')
		);
	}
}
