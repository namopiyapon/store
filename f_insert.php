<!--http://localhost/groom/f_insert.html-->

<?php 
session_save_path("./session");
session_start(); 
include_once("chk_session_timeout.php"); // 3.3 1800sec
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

$time = $_GET['hour'].":00:00";
?> <br>

<form method="post" action="inserttime.php">

<li><table>
<tr><td align="right">Name : </td>
    <td><?php echo $_SESSION["Cfirstname"]." ".$_SESSION["Clastname"]; ?></td></tr>

<tr><td align="right">Phone : </td>
    <td><?php echo $_SESSION["CPhone"]; ?></td></tr>
	
<tr><td align="right">Date : </td>
    <td><?php echo $_SESSION["date"]; ?></td></tr>
	
<tr><td align="right">Time : </td>
    <td><?php echo $time; ?>
	<input type="hidden" name="f_time" value="<?php echo $time ?>"></td></tr>
	
<tr><td align="right">Room Name : </td>
    <td><?php echo $_GET['room']; ?>
	<input type="hidden" name="f_Rname" value="<?php echo $_GET['room']; ?>"></td></tr>

<tr><td align="right">Pet Name : </td>
    <td><input type="text" name="f_Pname" maxlength="5" required/></td></tr>

<tr><td align="right">service : </td>
    <td><select name="f_service"/>
		<option value="Shower" selected>Shower</option>
		<option value="Hair cut">Hair cut</option>
	</select></td></tr>
	
<tr><td align="right">type : </td>
    <td><input type="radio" name="f_animal" value="dog" checked/>Dog
		<input type="radio" name="f_animal" value="cat"/>Cat</td></tr>
		
	
<tr><td align="right">RECORDER : </td>
    <td><?php echo $_SESSION["firstname"]." ".$_SESSION["lastname"] ?></td></tr>
	
<tr><td colspan="2" align= "center">
	<input type="submit" value="Save" />
	<input type="button" value="Back" onclick="location.href='time_insert.php';"></td></tr></td></tr>
</table></li>
</form>
</body>
</center>
</html>
