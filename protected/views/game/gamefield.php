<table id="gamefield">
<?php
foreach($cells as $y => $row) {
	echo "<tr>";
	foreach ($row as $x => $content) {
        if (is_null($content))
            $content = "<a href='?r=game/cell&x={$x}&y={$y}&gid={$game->id}'>Ходить</a>";
		echo "<td>{$content}</td>";
	}
	echo "</tr>";
}
?>
</table>

<style>
#gamefield td {
	border: 1px solid black;
	width: 16px;
	height: 16px;
}
</style>