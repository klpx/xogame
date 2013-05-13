<h1>Список игр</h1>

<a href="?r=game/create">Создать свою</a>

<table>
	<tr>
		<td>Game ID</td>
		<td>Player X ID</td>
		<td>Player O ID</td>
		<td>Current player ID</td>
	</tr>

	<?php
	foreach ($games as $game) {
		echo "<tr>";
		echo "<td>{$game->id}</td>";
		echo "<td>{$game->playerX_id}</td>";
		echo "<td>{$game->playerO_id}</td>";
		echo "<td>{$game->current_player_id}</td>";
		echo "</tr>";
	}
	?>
</table>