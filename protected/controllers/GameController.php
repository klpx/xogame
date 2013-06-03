<?php

class GameController extends Controller
{
    public function getGame($gid) {
        // Метод получения объекта игры
        $game = Game::model()->with('cells')->findByPk($gid);
        if (!is_object($game)) {
            throw new CHttpException('404', 'Game not created!');
        }
        return $game;
    }

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
            $this->redirect(array('game/play', 'gid' => $game->id));
        }
		$this->render('create');
	}

    public function actionJoin($gid) {
        // В переменную $gid умный Yii записывает значение $_GET['gid']
        $game = $this->getGame($gid);

        // Присоединяемся к игре
        $userId = Yii::app()->user->id;

        if (empty($game->playerO_id) && $userId != $game->playerX_id)
            $game->playerO_id = $userId;
        else if (empty($game->playerX_id) && $userId != $game->playerO_id) {
            $game->playerX_id = $userId;
            $game->current_player_id = $userId;
        }
        $game->save();
        $this->redirect(array('game/play', 'gid' => $game->id));
    }

    public function actionPlay($gid)
    {
        $game = $this->getGame($gid);

        if(!is_null($game->win_player_id)) {
            echo 'Игра окончена! Победил игрок с айдишником ' . $game->win_player_id;
        } else {
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
    }

    public function actionCell($gid) {

        $cell = new Cell;
        $cell->X = $_GET['x'];
        $cell->Y = $_GET['y'];

        $dbcell = Cell::model()->exists('Y =:cellY and X =:cellX and game_id =:gid', 
            array(':cellX' => $cell->X, ':cellY' => $cell->Y, ':gid' => $gid));
        
        if ($dbcell) 
            throw new CHttpException('403', 'YOU FOOL! ANOTHER PLAYER GOES');

        $game = Game::model()->with('cells')->findByPk($_GET['gid']);

        if (Yii::app()->user->id != $game->current_player_id) 
            throw new CHttpException('403', 'ACCESS DENIED');

        if ($game->current_player_id === $game->playerX_id ) {
            $cell->content = 'X';
            $game->current_player_id = $game->playerO_id;
        }
        else {
            $cell->content = 'O';
            $game->current_player_id = $game->playerX_id;
        }

        $cell->game_id = $game->id; 

        $cell->save();

        $game->detectVictory($cell->X, $cell->Y, $cell->content);
        $game->save();

        $this->redirect(array('game/play', 'gid' => $game->id));
    }
}