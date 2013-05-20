<h1>Список игр</h1>

<a href="?r=game/create">Создать свою</a>

<table>
	<tr>
		<td>Player X ID</td>
		<td>Player O ID</td>
		<td>Current player ID</td>
		<td></td>
	</tr>

	<?php
	foreach ($games as $game) {
		echo "<tr>";
		echo "<td>{$game->playerX->name}</td>";
		echo "<td>{$game->playerO->name}</td>";
		echo "<td>{$game->current_player_id}</td>";
		echo "<td><a href='/?r=game/play&gid={$game->id}'>Play</a></td>";
		echo "</tr>";
	}
	?>
</table>