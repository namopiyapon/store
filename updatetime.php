<?php
session_save_path("./session");
session_start(); 
include_once("chk_session_timeout.php"); // 3.3 1800sec
require_once("db_connect.php");
//$db_conn->query("BEGIN");


//---------- DB PERSONNEL ----------//
$sqlP  = "UPDATE personnel ";
$sqlP .= "SET service = '".$_POST["f_service"]."' , ";
$sqlP .= 	"animal = '".$_POST["f_animal"]."', ";
$sqlP .= 	"P_name = '".$_POST["f_Pname"]."' ";
$sqlP .=	"WHERE	ID = '".$_POST["f_ID"]."' AND A_ID = '".$_POST["f_AID"]."';";

echo $sqlP ."<br/><br/>";

$rsP = $db_conn->query($sqlP);
if ($rsP == FALSE) {
	echo "Error: ".$sqlP."<br/><br/>";
	echo $db_conn->error."<br/><br/>";
	//$db_conn->close();
	//exit();
} else {
	echo "<font color='blue'>Insert Successfully</font><br/>";
}

/*
//---------- ROLLBACK ----------//
if ($rsC and $rsP) {
		$db_conn->query("COMMIT");
		echo "commit<br/><br/>";
	} else {
		$db_conn->query("ROLLBACK");
	echo "rollback" ."<br/>";
	
	echo "<form action='f_tabel.php' method='POST'>";
	echo "<input type='submit' value='Back to tabel'>";
	echo "</form>";
	
	$db_conn->close();
	exit();
	}
*/
// redirect  โดยหน่วงเวลา 2 วินาที
echo "<meta http-equiv='Refresh' content='1;url=f_table.php'>\n";

?>
