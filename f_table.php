<?php
require_once("db_connect.php");

echo "<html>\n";
echo "<head> <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /> \n";
echo "<link rel='stylesheet' href='Shaed.css'>";
echo "<title>Groom</title>\n";
echo "</head>\n";
echo "<center>";
echo "<body>\n";


require_once("head.php");

echo "<h1>Appointment Groom</h1>\n";
	//----------search----------//
echo "<form action='". $_SERVER['PHP_SELF']."' method='POST'>";
echo "Search Firstname :<input type='text' name='search'>\n\n\n";
echo "Date :<input type='date' name='searchdate'/>\n\n\n";
echo "<input type='submit' value='search'>";
echo "</form>";
//echo $search;
	//----------search----------//

echo "<form method='post' action=''>\n";

echo "<table>\n";
	//---------- Head Tabel ----------//
echo "<tr bgcolor='#f1f1f1'>\n";
echo "<th>ID</th>\n";
echo "<th>Firstname</th>\n";
echo "<th>Lastname</th>\n";
echo "<th>Date</th>\n";
echo "<th>Phone</th>\n";
echo "<th></th>\n";
echo "</tr>\n";
	//---------- Head Tabel ----------//

$sql  = "SELECT * FROM customer WHERE ( C_name LIKE '%".$_POST["search"]."%' ) and ( date LIKE '%".$_POST["searchdate"]."%' )  ORDER BY ID desc;";
//echo $sql;

$rs = $db_conn->query($sql)
	or die("Error: ".$sql."<br/><br/>");

if($rs->num_rows > 0) {

	while ($row = $rs->fetch_assoc()) {
		echo "<tr>\n";
		echo "<th><a href='detailed.php?ID=".$row["ID"]."'/>".$row["ID"]."</a></th>\n";
		echo "<td><a href='detailed.php?ID=".$row["ID"]."'/>".$row["C_name"]."</a></td>\n";
		echo "<td><a href='detailed.php?ID=".$row["ID"]."'/>".$row["C_lastname"]."</a></td>\n";
		echo "<td>".$row["date"]."</td>\n";
		echo "<td>".$row["phone"]."</td>\n";
		
		echo "<td align='center'>";
		// เพิ่ม ลบ
		echo "<a href='f_update.php?ID=".$row["ID"]."'/><img src=images/edit.png width='30'></a>\n";
		echo "<a href='delete.php?ID=".$row["ID"]."' class='confirmation' /><img src=images/remove.png width='30'></a>\n";
		
		echo "</td></tr>\n";
	}
	$rs->free_result();
} else {
	echo "<tr>\n";
	echo "<td colspan='8'>Data not found.</td>\n";
	echo "</tr>\n";
}


echo "</table>\n";
echo "</form>\n";
echo "</body>\n";
echo "</center>";
echo "</html>\n";
?>

<!-- javascript -->

<script type="text/javascript">
    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure to delete?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>