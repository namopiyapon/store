<?php
session_save_path("./session");
session_start(); 
include_once("chk_session_timeout.php"); // 3.3 1800sec
require_once("db_connect.php");

$sql = "DELETE FROM customer WHERE ID = '".$_SESSION["ID"]."';";

	echo $sql;

	if ($db_conn->query($sql) == FALSE) {
		echo "Error: " .$sql. "<br/><br/>\n";
		echo $db_conn->error;
		$db_conn->close();
		exit(0);
	} else {
		echo "<font color='blue' Delete successfully.</font>\n";
	}


unset($_SESSION["date"]);
unset($_SESSION["ID"]);
unset($_SESSION["CPhone"]);
unset($_SESSION["Cfirstname"]);
unset($_SESSION["Clastname"]);
unset($_SESSION["A_ID"]);




echo "<meta http-equiv='Refresh' content='0;url=home.php'>\n";

?>