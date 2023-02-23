<!--http://localhost/groom/f_insert.html-->
<?php
session_save_path("./session");
session_start(); 
include_once("chk_session_timeout.php"); // 3.3 1800sec
require_once("db_connect.php");




$sql  = "SELECT * FROM personnel  WHERE ID = '".$_GET["ID"]."' AND A_ID = '".$_GET["A_ID"]."' ;";
//echo $sql . "<br/><br/>";

$rs = $db_conn->query($sql)
	or die ("Error: " . $sql . "<br/><br/>");
$row = $rs->fetch_assoc();

echo "<html>";
echo "<head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<link rel='stylesheet' href='Shaed.css'>";
echo "<title>Groom Update</title>";
echo "</head>";
echo "<center>";
echo "<body>";
require_once("head.php");
echo "<h1>Insert appointment</h1>";

echo "<form method='post' action='updatetime.php'>";
echo "<table>";

echo "<tr><td align='right'>ID: </td>";
    echo "<td>".$row["ID"]."</td></tr>";

echo "<tr><td align='right'>NO: </td>";
    echo "<td>".$row["A_ID"]."</td></tr>";

echo "<tr><td align='right'>Pet Name: </td>";
    echo "<td><input type='text' name='f_Pname' value='".$row["P_name"]."' maxlength='5' required/></td></tr>";
	

	//---------------------select----------------------------
echo "<tr><td align='right'>Room Name : </td>";
    echo "<td>".$row["R_name"]."</td></tr>";

echo "<tr><td align='right'>service : </td>";
    echo "<td><select name='f_service'/>";
		echo "<<option value='Shower'>Shower</option>";
		if($row["service"]=="Shower"){echo"selected";} ; 
		echo  ">Shower</option>";
		echo "<<option value='Hair cut'>Hair cut</option>";
		if($row["service"]=="Hair cut"){echo"selected";} ; 
		echo  ">Hair cut</option>";

	echo "</select></td></tr>";
	
	//------------------------radio-------------------------
echo "<tr><td align='right'>type : </td>";
	echo "<td><input type='radio' name='f_animal' value='dog'";
	if($row["animal"]=="dog"){echo"checked";} ; 
	echo ">Dog  ";
	
	echo "<input type='radio' name='f_animal' value='cat'";
	if($row["animal"]=="cat"){echo"checked";} ; 
	echo ">Cat</td></tr>";
	
echo "<tr><td align='right'>RECORDER : </td>";
    echo "<td>".$_SESSION["firstname"]." ".$_SESSION["lastname"]."</td></tr>";
	
    echo "<input type='hidden' name='f_ID' value='".$row["ID"]."'/>";
	echo "<input type='hidden' name='f_AID' value='".$row["A_ID"]."'/>";
	
echo "<tr><td colspan='2' align='center'>";
	echo "<input type='submit' value='Save' />";
	echo "<input type='button' value='Back' onclick='Back()';'></td></tr>";
echo "</table>";
echo "</form>";
echo "</body>";
echo "</center>";
echo "</html>";

?>

<script type="text/javascript">
function Back() {
	window.location.href="detailed.php?ID=<?php echo $row["ID"] ?>";
}
</script>