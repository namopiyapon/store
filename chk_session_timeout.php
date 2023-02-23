<?php
// last request was more than 30 minutes (30*60 = 1800 seconds) ago 
if(isset($_SESSION["LAST_ACTIVITY"]) && 
	(time() - $_SESSION["LAST_ACTIVITY"] > 1800)) {
	session_unset();
	session_destroy();
}

$_SESSION["LAST_ACTIVITY"] = time();

?>

