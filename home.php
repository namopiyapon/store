<!--localhost/groom/index.html-->
<?php
echo "<html>";
echo "<head>";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";

echo "<link rel='stylesheet' href='Shaed.css'>";

echo "<title>Groom</title>";
echo "</head>";
echo "<center>";
echo "<body>";

	require_once("head.php");

	echo "<h1>Menu</h1>";
	echo "<ul class='manu'>";
		echo "<li><a href='calendar.php'/> จอง </a></li>";
		echo "<li><a href='f_table.php'/> รายชื่อ </a></li>";
	
	echo "</ul>";


echo "</body>";
echo "</center>";
echo "</html>";

?>