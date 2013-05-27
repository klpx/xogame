<h1>Список текущих игр</h1>

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
        if (!empty($game->playerX))
		    echo "<td>{$game->playerX->name}</td>";
        else
            echo "<td> ожидаем </td>";
        if (!empty($game->playerO))
    		echo "<td>{$game->playerO->name}</td>";
        else
            echo "<td> ожидаем </td>";
		echo "<td>{$game->current_player_id}</td>";
		echo "<td><a href='/?r=game/play&gid={$game->id}'>Play</a></td>";
		echo "</tr>";
	}
	?>
</table>