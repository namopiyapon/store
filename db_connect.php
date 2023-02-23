<?php
	
$db_host = "localhost";
$db_user = "admin";
$db_password = "123456";
$db_name = "groom";

$db_conn = new mysqli($db_host,$db_user,$db_password,$db_name);

/*if($db_conn->connect_error){
	die ("DB Connection Failed !!". $db_conn->connect_error);
} else {
	echo "DB connection Successful.<br><br>";
}*/
/*mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client='utf8'");
mysql_query("SET character_set_connection='utf8'");
mysql_query("collation_connection = utf8_unicode_ci");
mysql_query("collation_database = utf8_unicode_ci");
mysql_query("collation_server = utf8_unicode_ci");*/

//localhost/groom/db_connect.php

?>
