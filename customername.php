<!--http://localhost/groom/f_insert.html-->

<?php 
session_save_path("./session");
session_start(); 
include_once("chk_session_timeout.php"); // 3.3 1800sec

if(isset($_SESSION["ID"]) || isset($_SESSION["Cfirstname"])){
	echo "<meta http-equiv='Refresh' content='0;url=time_insert.php'>";
	
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="Shaed.css">
<title>Groom</title>
</head>
<center>
<body>
<?php require_once("head.php"); 
?> <br>

<form method="post" action="insert.php">

<li><table>
<tr><td align="right">Customer Name: </td>
    <td><input type="text" name="f_Cname" maxlength="10" required/></td></tr>
	
<tr><td align="right">Lastname : </td>
    <td><input type="text" name="f_Clastname" maxlength="10" required/></td></tr>
	
	
<tr><td align="right">Phone : </td>
    <td><input type="text" name="f_phone" minlength="9" onkeyup="autoTab(this)" required/></td></tr>
		
	
<tr><td align="right">RECORDER : </td>
    <td><?php echo $_SESSION["firstname"]." ".$_SESSION["lastname"] ?></td></tr>
	
<tr><td colspan="2" align= "center">
	<input type="submit" value="Next" />
	<input type="button" value="Back" onclick="location.href='calendar.php';"></td></tr>
</table></li>
</form>
</body>
</center>
</html>

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
