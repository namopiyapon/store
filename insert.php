<?php
session_save_path("./session");
session_start(); 
include_once("chk_session_timeout.php"); // 3.3 1800sec

require_once("db_connect.php");



//$db_conn->query("BEGIN");

		//---------- DB CUSTOMER ----------//
$sqlC  = "INSERT INTO customer(C_name,C_lastname,phone,date,user) ";
$sqlC .= "VALUES ('".$_POST["f_Cname"]."', ";
$sqlC .=			"'".$_POST["f_Clastname"]."', ";
$sqlC .=			"'".$_POST["f_phone"]."', ";
$sqlC .=			"'".$_SESSION["date"]."', ";
$sqlC .=			"'".$_SESSION["user"]."');";

echo $sqlC ."<br/><br/>";
$rsC = $db_conn->query($sqlC);
if ($rsC == FALSE) {
	echo "Error: ".$sqlC."<br/><br/>";
	echo $db_conn->error."<br/><br/>";
	//$db_conn->close();
	//exit();
} else {
	
		//---------- SELECT MAXID ----------//
	$sql = "SELECT MAX(id) FROM customer";
	echo $sql . "<br/><br/>";

	$rs = $db_conn->query($sql)
		or die("Error: ".$sql."<br/><br/>");

	$row = $rs->fetch_assoc();


	$_SESSION["ID"] = $row["MAX(id)"];
	$_SESSION["CPhone"] = $_POST["f_phone"];
	$_SESSION["Cfirstname"] = $_POST["f_Cname"];
	$_SESSION["Clastname"] = $_POST["f_Clastname"];
	$_SESSION["A_ID"] = 0;

	echo "<font color='blue'>Insert Successfully</font><br/>";
}

/*
		//---------- DB PERSONNEL ----------//
$sqlP  = "INSERT INTO personnel(ID,date,time,service,animal,R_name) ";
$sqlP .= "VALUES ('".$row["MAX(id)"]."', ";
$sqlP .=			"'".$_POST["f_date"]."', ";
$sqlP .=			"'".$_POST["f_time"]."', ";
$sqlP .=			"'".$_POST["f_service"]."', ";
$sqlP .=			"'".$_POST["f_animal"]."', ";
$sqlP .=			"'".$_POST["f_Rname"]."');";

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

		//---------- ROLLBACK ----------//
if ($rsC and $rsP) {
		$db_conn->query("COMMIT");
		echo "commit<br/><br/>";
	} else {
		$db_conn->query("ROLLBACK");
	echo "rollback" ."<br/>";
	
	echo "<form action='f_insert.php' method='POST'>";
	echo "<input type='submit' value='Back to insert'>";
	echo "</form>";
	
	$db_conn->close();
	exit();
	}
*/

// redirect  โดยหน่วงเวลา 2 วินาที
echo "<meta http-equiv='Refresh' content='1;url=time_insert.php'>\n";

