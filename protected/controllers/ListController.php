<?php

class ListController extends Controller
{
	public function actionIndex()
	{
		$games = Game::model()->with('playerX')->with('playerO')->findAll('playerX_id is null or playerO_id is null');
        $this->render('gamelist', array(
            'games'=>$games
        ));
	}

	public function actionCurrent()
	{
		$userId = Yii::app()->user->id;
		$games = Game::model()->with('playerX')->with('playerO')->findAll('playerX_id =:userId or playerO_id =:userId', array(':userId'=>$userId));
        $this->render('currentgames', array(
            'games'=>$games
        ));
	}	
}