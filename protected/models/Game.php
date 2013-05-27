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

	public function relations()
	{
		return array(
			'cells' => array(self::HAS_MANY, 'Cell', 'game_id'),
			'playerX' => array(self::BELONGS_TO, 'User', 'playerX_id'),
			'playerO' => array(self::BELONGS_TO, 'User', 'playerO_id')
		);
	}

	private function createCellsArray()
	{
		$fieldSize = Yii::app()->params['fieldSize'];
        $cells = array();

        for ($y = 0; $y < $fieldSize; $y++) {
            $cells[$y] = array_fill(0, $fieldSize, null);
        }

        foreach ($this->cells as $cell) {
            $cells[$cell->Y][$cell->X] = $cell->content;
        }


        return $cells;
	}

	public function detectVictory($baseX, $baseY, $mark)
	{
		$counters = array(
			'hor' => 1,
			'vert' => 1,
			'ascDiag' => 1,
			'descDiag' => 1
		);

		$steps = array(
			array('dx' => -1, 'dy' =>  0, 'name' => 'hor'),
			array('dx' =>  1, 'dy' =>  0, 'name' => 'hor'),
			array('dx' =>  0, 'dy' =>  1, 'name' => 'vert'),
			array('dx' =>  0, 'dy' => -1, 'name' => 'vert'),
			array('dx' =>  1, 'dy' =>  1, 'name' => 'ascDiag'),
			array('dx' => -1, 'dy' => -1, 'name' => 'ascDiag'),
			array('dx' =>  1, 'dy' => -1, 'name' => 'descDiag'),
			array('dx' => -1, 'dy' =>  1, 'name' => 'descDiag')
		);

		$cells = $this->createCellsArray();
		$fieldSize = Yii::app()->params['fieldSize'];

		foreach($steps as $step) {
			$x = $baseX + $step['dx'];
			$y = $baseY + $step['dy'];

			while($x >= 0 && $x < $fieldSize && $y >= 0 && $y < $fieldSize) {			
				if($cells[$y][$x] !== $mark) break;
				$counters[$step['name']]++;
				$x += $step['dx'];
				$y += $step['dy'];
			}
		}

		foreach($counters as $counter) {
			if($counter >= 5) {
				$this->win_player_id = $this->current_player_id;
				break;
			}
		}

		$this->save();
	}
}
