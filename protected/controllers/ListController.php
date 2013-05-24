<?php

class ListController extends Controller
{
	public function actionIndex()
	{
		$games = Game::model()->with('playerX')->with('playerO')->findAll();
        $this->render('gamelist', array(
            'games'=>$games
        ));
	}
}