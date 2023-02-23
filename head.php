<?php
session_save_path("./session");
session_start(); 
include_once("chk_session_timeout.php"); // 3.3 1800sec 

if(!isset($_SESSION["firstname"]) || !isset($_SESSION["lastname"])){
	echo "<meta http-equiv='Refresh' content='0;url=index.php'>";
	
}
echo "<img src=images/head.jpg width='800'>";

echo "<center>ชื่อผู้ใช้ : ".$_SESSION["firstname"]." ".$_SESSION["lastname"]."\n<a href='logout.php' /><img src=images/logout1.png width='15'></a></center>"; 
echo "<ul class='home'>";
echo "<li><a href='home.php' /><img src=images/dog-and-cat-in-pet-hotel.png width='30'></a></li>"; 
echo "</ul>";
	
?>