<!--localhost/groom/index.html-->
<?php
session_save_path("./session");
session_start(); 
include_once("chk_session_timeout.php"); // 3.3 1800sec

echo "<html>";
echo "<head>";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";

echo "<link rel='stylesheet' href='Shaed.css'>";

if(isset($_SESSION["firstname"]) && isset($_SESSION["lastname"])){
	echo "<meta http-equiv='Refresh' content='0;url=home.php'>";
	
}
echo "<title>Groom</title>";
echo "</head>";
echo "<center>";
echo "<body>";

	//require_once("head.php");
	echo "<form method='post' action='login.php'> ";
	echo "<h1>LOGIN</h1>";
	echo "<ul class='manu'>";
		echo "<li>User :<input type='text' name='user' required/> </li><br>";
		echo "<li>Password :<input type='password' name='password' required/> </li><br>";
		echo "<li><input type='submit' value='login'></li>";
	
	echo "</ul>";
	echo "</form>";


echo "</body>";
echo "</center>";
echo "</html>";

?>