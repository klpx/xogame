<?php

class GameController extends Controller
{
	public function actionCreate()
	{
        $userId = Yii::app()->user->id;
		if (isset($_POST['create_button']) && isset($_POST['symbol'])) {
            $game = new Game;
            if ($_POST['symbol'] == 'x') {
            	$game->playerX_id = $userId;
            	$game->current_player_id = $userId;
            }
            else
            	$game->playerO_id = $userId;
            $game->save();
            $this->redirect('/?r=list');
        }
		$this->render('create');
	}

    public function actionPlay()
    {
        $gameId = @$_GET['gid'];
        $game = Game::model()->with('cells')->findByPk($gameId);
        if (!is_object($game)) {
            throw new CHttpException('404', 'Game not created!');
        }

        
    }
}