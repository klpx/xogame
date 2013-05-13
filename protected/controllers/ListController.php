<?php

class ListController extends Controller
{
	public function actionIndex()
	{
		$games = Game::model()->findAll();
        $this->render('gamelist', array(
            'games'=>$games
        ));
	}
}