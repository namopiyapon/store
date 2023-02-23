<?php
require_once("db_connect.php");

	$sql = "DELETE FROM customer WHERE ID = '".$_GET["ID"]."';";

	echo $sql;

	if ($db_conn->query($sql) == FALSE) {
		echo "Error: " .$sql. "<br/><br/>\n";
		echo $db_conn->error;
		$db_conn->close();
		exit(0);
	} else {
		echo "<font color='blue' Delete successfully.</font>\n";
	}


$db_conn->close();
echo "<meta http-equiv='Refresh' content='1;url=f_table.php'>\n";

?>