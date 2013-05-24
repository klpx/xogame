<table id="gamefield">
<?php
foreach($cells as $row) {
	echo "<tr>";
	foreach ($row as $content) {
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