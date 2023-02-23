<!--http://localhost/groom/f_insert.html-->
<?php
session_save_path("./session");
session_start(); 
include_once("chk_session_timeout.php"); // 3.3 1800sec
require_once("db_connect.php");




$sql  = "SELECT * FROM customer  WHERE ID = '".$_GET["ID"]."';";
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

echo "<form method='post' action='update.php'>";
echo "<table>";

echo "<tr><td align='right'>ID: </td>";
    echo "<td>".$row["ID"]."</td></tr>";

echo "<tr><td align='right'>Name: </td>";
    echo "<td><input type='text' name='f_Cname' value='".$row["C_name"]."' maxlength='10' required/></td></tr>";
	
echo "<tr><td align='right'>Lastname : </td>";
    echo "<td><input type='text' name='f_Clastname' value='".$row["C_lastname"]."' maxlength='10' required/></td></tr>";
	
echo "<tr><td align='right'>Date : </td>";
    echo "<td>".$row["date"]."</td></tr>";
	
echo "<tr><td align='right'>Phone : </td>";
	echo "<td><input type='text' name='f_phone' value='".$row["phone"]."' onkeyup='autoTab(this)' required/></td></tr>";
	
echo "<tr><td align='right'>RECORDER : </td>";
    echo "<td>".$_SESSION["firstname"]." ".$_SESSION["lastname"]."</td></tr>";
	
    echo "<input type='hidden' name='f_ID' value='".$row["ID"]."'/>";
	
echo "<tr><td colspan='2' align='center'>";
	echo "<input type='submit' value='Save' />";
	echo "<input type='reset'/></td></tr>";
echo "</table>";
echo "</form>";
echo "</body>";
echo "</center>";
echo "</html>";

?>

<!-- javascript -->

<script type="text/javascript">  
function autoTab(obj){   
var pattern=new String("__-____-____"); // กำหนดรูปแบบในนี้  
var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้  
var returnText=new String("");  
var obj_l=obj.value.length;  
var obj_l2=obj_l-1;  
for(i=0;i<pattern.length;i++){             
	if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){  
		returnText+=obj.value+pattern_ex;  
		obj.value=returnText;  
	}  
}  
	if(obj_l>=pattern.length){  
		obj.value=obj.value.substr(0,pattern.length);             
	}  
}  
</script>