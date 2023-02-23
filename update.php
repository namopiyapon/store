<?php
session_save_path("./session");
session_start(); 
include_once("chk_session_timeout.php"); // 3.3 1800sec
require_once("db_connect.php");
//$db_conn->query("BEGIN");


		//---------- DB CUSTOMER ----------//
$sqlC  = "UPDATE customer ";
$sqlC .= "SET C_name = '".$_POST["f_Cname"]."' , ";
$sqlC .= 	"C_lastname = '".$_POST["f_Clastname"]."', ";
$sqlC .= 	"user = '".$_SESSION["user"]."', ";
$sqlC .= 	"phone = '".$_POST["f_phone"]."' ";
$sqlC .=	"WHERE	ID = '".$_POST["f_ID"]."';";

echo $sqlC ."<br/><br/>";

$rsC = $db_conn->query($sqlC);
if ($rsC == FALSE) {
	echo "Error: ".$sqlC."<br/><br/>";
	echo $db_conn->error."<br/><br/>";
	//$db_conn->close();
	//exit();
} else {
	echo "<font color='blue'>Insert Successfully</font><br/>";
}
// redirect  โดยหน่วงเวลา 2 วินาที
echo "<meta http-equiv='Refresh' content='1;url=f_table.php'>\n";

?>
