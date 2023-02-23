<?php
session_save_path("./session");
session_start(); 
include_once("chk_session_timeout.php"); // 3.3 1800sec

if(isset($_SESSION["ID"])){
	echo "<meta http-equiv='Refresh' content='0;url=time_insert.php'>";
	
}

unset($_SESSION["date"]);

require_once("db_connect.php");
echo "<link rel='stylesheet' href='Shaed.css'>";
header('Content-Type: text/html; charset=utf-8');
$weekDay = array( 'อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสฯ', 'ศุกร์', 'เสาร์');
$thaiMon = array( "01" => "มกราคม", "02" => "กุมภาพันธ์", "03" => "มีนาคม", "04" => "เมษายน",
      "05" => "พฤษภาคม","06" => "มิถุนายน", "07" => "กรกฎาคม", "08" => "สิงหาคม",
      "09" => "กันยายน", "10" => "ตุลาคม", "11" => "พฤศจิกายน", "12" => "ธันวาคม");

//Sun - Sat
$month = isset($_POST['month']) ? $_POST['month'] : date('m'); //ถ้าส่งค่าเดือนมาใช้ค่าที่ส่งมา ถ้าไม่ส่งมาด้วย ใช้เดือนปัจจุบัน
$year = isset($_POST['year']) ? $_POST['year'] : date('Y'); //ถ้าส่งค่าปีมาใช้ค่าที่ส่งมา ถ้าไม่ส่งมาด้วย ใช้ปีปัจจุบัน

//วันที่
$startDay = $year.'-'.$month."-01";   //วันที่เริ่มต้นของเดือน

$timeDate = strtotime($startDay);   //เปลี่ยนวันที่เป็น timestamp
$lastDay = date("t", $timeDate);   //จำนวนวันของเดือน

$endDay = $year.'-'.$month."-". $lastDay;  //วันที่สุดท้ายของเดือน

$startPoint = date('w', $timeDate);   //จุดเริ่มต้น วันในสัปดาห์

?>


<html>
 <head>
 <title>Calendar</title>
 <script type='text/javascript'>
    function goTo(month, year){
   window.location.href = "day_of_week.php?year="+ year +"&month="+ month;
    }
 </script>
 <style>
 th,td{width:50px;height: 30px; text-align:center}
 th{background-color: #eeeeee;}
 #tb_calendar, #main{ width : 500px;}
 #main{ border : 2px solid #46A5E0;}
 #nav{
  background-color: #0C79A4;
  min-height: 20px;
  padding: 10px;
  text-align: center;
  color : white;
 }
 .navLeft{float: left; }
 .navRight{float: right;}
 .title{float: left; text-align: center; width: 300px;}
 </style>
 </head>
 <center>
 <body>
 <?php
require_once("head.php");
echo "<br>";
echo "วันที่ปัจจุบัน คือ ".date("Y/m/d")."<br><br>";
//echo $month."/";
echo "<form method='post' action='". $_SERVER['PHP_SELF']."'>";
//echo $month."/";
echo "เดือน<input type='number' min='1' max='31' step='1' name='month' value='".$month."' required>\n";
echo "ปี<input type='number' min='". date('Y')."' max='2099' step='1' name='year' value='".$year."' required>";
echo "<input type='submit' value='ENTER'>";
echo "</form>";
//echo $year."<br>";

$title = "เดือน $thaiMon[$month] <strong>". $startDay. " : ". $endDay."</strong>";
 

//ลดเวลาลง 1 เดือน
$prevMonTime = strtotime ( '-1 month' , $timeDate  );
$prevMon = date('m', $prevMonTime);
$prevYear = date('Y', $prevMonTime);

//เพิ่มเวลาขึ้น 1 เดือน
$nextMonTime = strtotime ( '+1 month' , $timeDate  );
$nextMon = date('m', $nextMonTime);
$nextYear = date('Y', $nextMonTime);

echo "<form method='post' action='finish.php'>\n";
//echo "<a href='". $_SERVER['PHP_SELF']."?month=".$prevMon."&year = ".$prevYear."'><input type='button'  value= '<<prevMon' ></a>";
//echo "<a href='". $_SERVER['PHP_SELF']."?month=".$nextMon."&year = ".$nextYear."'><input type='button'  value= 'nextMon>>' ></a>";

echo "<table id='tb_calendar' border='1'>"; //OPENTABLE
echo "<tr>
		<th>อาทิตย์</th><th>จันทร์</th><th>อังคาร</th><th>พุธ</th><th>พฤหัสฯ</th><th>ศุกร์</th><th>เสาร์</th>
	</tr>";
echo "<tr>";
$col = $startPoint;
if($startPoint < 7){        
 echo str_repeat("<td> </td>", $startPoint); 
}
for($i=1; $i <= $lastDay; $i++){
	
	$d = $year."-".$month."-".sprintf("%02d",$i);
	$sql  = "SELECT date FROM customer WHERE ( date LIKE '%".$d."%' );";
		//echo $sql."<br>";

		$rs = $db_conn->query($sql)
		or die("Error: ".$sql."<br/><br/>");
	
	
	$col++; 
	echo "<td>".$i."<br>";
		
	if($rs->num_rows < 24){
		echo "<a href='savedate.php?day=".sprintf("%02d",$i)."& month=".$month."& year=".$year."'><input type='button'  value= 'ว่าง' ></a>";
	}else{echo "<font color='red'>เต็ม</font>";}
	
	echo "</td>";
	if($col % 7 == false){
	echo "</tr><tr>";
	$col = 0;
	}
}
if($col < 7){
	echo str_repeat("<td> </td>", 7-$col);
}


echo '</table>'; //CLOSTABLE


 ?>
 
 
</from>
</body>
</center>
</html>