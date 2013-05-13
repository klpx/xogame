<?php

class GameController extends Controller
{
	public function actionCreate()
	{
		if (isset($_POST['create_button']) && isset($_POST['symbol'])) {
            $game = new Game;
            if ($_POST['symbol'] == 'x'){
            	$game->playerX_id = 1;
            	$game->current_player_id = 1;
            }
            else
            	$game->playerO_id = 1;
            $game->save();
        }
		$this->render('create');
	}
}