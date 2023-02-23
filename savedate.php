<?php
session_save_path("./session");
session_start(); 
include_once("chk_session_timeout.php"); // 3.3 1800sec
$date = $_GET['year']."-".$_GET['month']."-".$_GET['day'];
$_SESSION["date"] = $date;
echo "<meta http-equiv='Refresh' content='0;url=customername.php'>\n";

?>