<?php
session_save_path("./session");
session_start(); 
include_once("chk_session_timeout.php"); // 3.3 1800sec

require_once("db_connect.php");

$_SESSION["A_ID"] = $_SESSION["A_ID"] + 1 ;

//$db_conn->query("BEGIN");


		//---------- DB PERSONNEL ----------//
$sqlP  = "INSERT INTO personnel(ID,time,service,animal,P_name,A_ID,R_name) ";
$sqlP .= "VALUES ('".$_SESSION["ID"]."', ";
$sqlP .=			"'".$_POST["f_time"]."', ";
$sqlP .=			"'".$_POST["f_service"]."', ";
$sqlP .=			"'".$_POST["f_animal"]."', ";
$sqlP .=			"'".$_POST["f_Pname"]."', ";
$sqlP .=			"'".$_SESSION["A_ID"]."', ";
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

/*
if(mysqli_query($db_conn, $sqlP))
    {
     $output .= '<label class="text-success">Data Inserted</label>';
     $select_query = "SELECT * FROM personnel ORDER BY id DESC";
     $result = mysqli_query($db_conn, $select_query);
     $output .= '
      <table class="table table-bordered">  
                    <tr>  
                         <th width="70%">Employee Name</th>  
                         <th width="30%">View</th>  
                    </tr>

     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
                         <td>' . $row["name"] . '</td>  
                         <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                    </tr>
      ';
     }
     $output .= '</table>';
    }
    echo $output;

*/




/*
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

