<?php
session_save_path("./session");
session_start(); 
include_once("chk_session_timeout.php"); // 3.3 1800sec

require_once("db_connect.php");

$sql  = "SELECT user, firstname, lastname FROM account ";
$sql .= "WHERE user = '" .$_POST["user"]. "' AND " . "password = '" .$_POST["password"]."';";
echo $sql;
$rs = $db_conn->query($sql)
	or die ("Query failed: " . $sql . "<br><br>");

// 3.4
if($rs->num_rows == 1) {
	$row = $rs->fetch_assoc();
	$_SESSION["user"] = $row["user"];
	$_SESSION["firstname"] = $row["firstname"];
	$_SESSION["lastname"] = $row["lastname"];
} else {
	// Username or password is incorrect
	echo "<font color='red'>Invalid username or password.</font><br>";
	echo "<a href='index.php' />go to login..</a>";
	exit();
}	

echo "<meta http-equiv='Refresh' content='0;url=home.php'>";
?>
