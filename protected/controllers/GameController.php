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

        $fieldSize = Yii::app()->params['fieldSize'];
        $cells = array();

        for ($y=0; $y<$fieldSize; $y++) {
            $cells[$y] = array_fill(0, $fieldSize, null);
        }

        foreach ($game->cells as $cell) {
            $cells[$cell->Y][$cell->X] = $cell->content;
        }

        $this->render('gamefield', array('cells' => $cells, 'game' => $game));
    }

    public function actionCell() {

        $cell = new Cell;
        $cell->X = $_GET['x'];
        $cell->Y = $_GET['y'];

        $game = Game::model()->with('cells')->findByPk($_GET['gid']);
        if ($game->current_player_id === $game->playerX_id) {
            $cell->content = 'X';
            $game->current_player_id = $game->playerO_id;
        }
        else {
            $cell->content = 'O';
            $game->current_player_id = $game->playerX_id;
        }

        $cell->game_id = $game->id;

        $game->save();
        $cell->save();

        $this->redirect(array('game/play', 'gid' => $game->id));
    }
}