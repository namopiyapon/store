<?php
require_once("db_connect.php");
/*
$sql  = "SELECT * FROM customer LEFT JOIN personnel ON customer.ID = personnel.ID
		LEFT JOIN account ON customer.user = account.user 
		LEFT JOIN program ON personnel.service = program.service and  personnel.animal = program.animal
		WHERE customer.ID = '".$_GET["ID"]."';";
$rs = $db_conn->query($sql)
	or die("Error: ".$sql."<br/><br/>");
$row = $rs->fetch_assoc();*/

echo "<html>\n";
echo "<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />\n";

echo "<title>Groom Detailed</title>\n";
echo "<link rel='stylesheet' href='Shaed.css'>";
echo "</head>\n";
echo "<center>";
echo "<body>\n";


require_once("head.php");
echo "<h1>Detailed Groom</h1>\n";

//------------------------------------------------------------//

$sql  = "SELECT * FROM customer WHERE ID = ".$_GET["ID"].";";
//echo $sql;

$rs = $db_conn->query($sql)
	or die("Error: ".$sql."<br/><br/>");

$row = $rs->fetch_assoc();
echo "<table>\n";
echo "<tr bgcolor='#f1f1f1'>\n";
echo "<th align='left'>ID</th> <th>".$row["ID"]."</th> </tr>\n";

echo "<tr bgcolor='#f1f1f1'>\n";
echo "<th align='left'>Firstname</th> <th>".$row["C_name"]."</th> </tr>\n";

echo "<tr bgcolor='#f1f1f1'>\n";
echo "<th align='left'>Lastname</th> <th>".$row["C_lastname"]."</th> </tr>\n";

echo "<tr bgcolor='#f1f1f1'>\n";
echo "<th align='left'>Date</th> <th>".$row["date"]."</th> </tr>\n";

echo "<tr bgcolor='#f1f1f1'>\n";
echo "<th align='left'>Phone</th> <th>".$row["phone"]."</th> </tr>\n";

echo "</table>\n";

//------------------------------------------------------------//
echo "<form method='post' action='f_table.php'>\n";

echo "<table>\n";
	//---------- Head Tabel ----------//
echo "<tr bgcolor='#f1f1f1'>\n";
echo "<th>NO</th>\n";
echo "<th>Pet name</th>\n";
echo "<th>Room</th>\n";
echo "<th>Animal</th>\n";
echo "<th>Service</th>\n";
echo "<th>time</th>\n";
echo "<th></th>\n";
echo "</tr>\n";
	//---------- Head Tabel ----------//

$sql  = "SELECT * FROM customer LEFT JOIN personnel ON customer.ID = personnel.ID
		LEFT JOIN account ON customer.user = account.user 
		LEFT JOIN program ON personnel.service = program.service and  personnel.animal = program.animal
		WHERE customer.ID = '".$_GET["ID"]."' ORDER BY `personnel`.`A_ID` ASC ;";
//echo $sql;
echo "<input type='hidden' name='ID' value='".$_GET['ID']."'";

$rs = $db_conn->query($sql)
	or die("Error: ".$sql."<br/><br/>");

if($rs->num_rows > 0) {

	while ($row = $rs->fetch_assoc()) {
		echo "<tr>\n";
		echo "<th>".$row["A_ID"]."</a></th>\n";
		echo "<td>".$row["P_name"]."</a></td>\n";
		echo "<td>".$row["R_name"]."</a></td>\n";
		echo "<td>".$row["animal"]."</td>\n";
		echo "<td>".$row["service"]."</td>\n";
		echo "<td>".$row["time"]."</td>\n";

		echo "<td align='center'>";
		// เพิ่ม ลบ
		echo "<a href='f_updatetime.php?A_ID=".$row["A_ID"]."&ID=".$_GET['ID']."'/><img src=images/edit.png width='30'></a>\n";
		echo "<a href='deletetime.php?A_ID=".$row["A_ID"]."&ID=".$_GET['ID']."' class='confirmation' /><img src=images/remove.png width='30'></a>\n";
		
		echo "</td></tr>\n";
	}

} else {
	echo "<tr>\n";
	echo "<td colspan='8'>Data not found.</td>\n";
	echo "</tr>\n";
}

echo "<tr><td colspan='8' align= 'center' ><input type='button' value='Back' onclick='Back()';'></td></tr>";


echo "</table>\n";
echo "</form>\n";
echo "</body>\n";
echo "</center>";
echo "</html>\n";
?>

<!-- javascript -->

<script type="text/javascript">
function Back() {
	window.location.href="f_table.php";
}

var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure to delete?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>