<?php
session_save_path("./session");
session_start(); 
include_once("chk_session_timeout.php"); // 3.3 1800sec


require_once("db_connect.php");

echo "<html>\n";
echo "<head> ";
/*
echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js'></script>  
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' />  
	<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>  ";
*/
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' /> \n";
echo "<link rel='stylesheet' href='Shaed.css'>";
echo "<title>Groom</title>\n";
echo "</head>\n";
echo "<center>";
echo "<body>\n";

//$date = $_GET['year']."-".$_GET['month']."-".$_GET['day'];
//$_SESSION["date"] = $date;

require_once("head.php");

echo "<form method='post' action='finish.php'>\n";
echo "<h2>ตารางเวลา</h2>\n";
echo "ชื่อลูกค้า : ".$_SESSION["Cfirstname"]." ".$_SESSION["Clastname"]."\n<br>";
echo $_SESSION["date"];

echo "<table>\n";
	//---------- Head Tabel ----------//
echo "<tr bgcolor='#f1f1f1'>\n";
echo "<th>เวลา</th>\n";
for($t=8; $t<17; $t++){
	echo "<th>".sprintf("%02d",$t).".00 </th>\n";
}
echo "</tr>\n";
	//---------- Head Tabel ----------//
	//------------  Tabel -----------//
echo "<tr>\n";
echo "<td>ROOM A</td>\n";  // -----ROOM A-----
for($t=8; $t<17; $t++){
	if($t != 12 ){
		$sql  = "SELECT * FROM personnel LEFT JOIN customer on personnel.ID = customer.ID WHERE ( date LIKE '%".$_SESSION["date"]."%' ) and ( time LIKE '%".sprintf("%02d",$t).":00:00%' )and ( R_name LIKE '%A%' );";
		//echo $sql."<br>";

		$rs = $db_conn->query($sql)
		or die("Error: ".$sql."<br/><br/>");
		if($rs->num_rows == 0){
			//day=".$_GET['day']."&month=".$_GET['month']."&year=".$_GET['year']."&//
			echo "<td><a href='f_insert.php?hour=".sprintf("%02d",$t)."&room=A'><input type='button' value= 'ว่าง' ></a></td>\n";
		}else{echo "<td align='center'><font color='red'>เต็ม</font></td>";}
		
	}else{echo "<td align='center'>พัก</td>\n";}
}
echo "</tr>\n";

echo "<tr>";
echo "<td>ROOM B</td>\n"; // -----ROOM B-----
for($t=8; $t<17; $t++){
	if($t != 12 ){
		$sql  = "SELECT * FROM personnel LEFT JOIN customer on personnel.ID = customer.ID WHERE ( date LIKE '%".$_SESSION["date"]."%' ) and ( time LIKE '%".sprintf("%02d",$t).":00:00%' )and ( R_name LIKE '%B%' );";
		//echo $sql."<br>";

		$rs = $db_conn->query($sql)
		or die("Error: ".$sql."<br/><br/>");
		if($rs->num_rows == 0){
			echo "<td><a href='f_insert.php?hour=".sprintf("%02d",$t)."&room=B'><input type='button' value= 'ว่าง' ></a></td>\n";
//---------->echo "<td><input type='button' name='hour' id='".sprintf("%02d",$t)."' data-toggle='modal' data-target='#add_data_Modal' class='btn btn-warning' onclick='getValueFrom()' value='Add'></td>\n";
		}else{echo "<td align='center'><font color='red'>เต็ม</font></td>";}
		
	}else{echo "<td align='center'>พัก</td>\n";}
}
echo "</tr>\n";

echo "<tr>\n";
echo "<td>ROOM C</td>\n"; // -----ROOM C-----
for($t=8; $t<17; $t++){
	if($t != 12 ){
		$sql  = "SELECT * FROM personnel LEFT JOIN customer on personnel.ID = customer.ID WHERE ( date LIKE '%".$_SESSION["date"]."%' ) and ( time LIKE '%".sprintf("%02d",$t).":00:00%' )and ( R_name LIKE '%C%' );";
		//echo $sql."<br>";

		$rs = $db_conn->query($sql)
		or die("Error: ".$sql."<br/><br/>");
		if($rs->num_rows == 0){
			echo "<td><a href='f_insert.php?hour=".sprintf("%02d",$t)."&room=C'><input type='button' value= 'ว่าง' ></a></td>\n";
		}else{echo "<td align='center'><font color='red'>เต็ม</font></td>";}
		
	}else{echo "<td align='center'>พัก</td>\n";}
}
echo "</tr>\n";
echo "</table>\n";
	//------------  Tabel -----------//
echo "<br>";


echo "<input type='submit' value= 'Finish' >\n";
echo "<a href='cancel.php'><input type='button' value= 'cancel'></a>";
echo "</form>";
?>
<!--
<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">กรอกข้อมูล </h4>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Pet Name</label>
     <input type="text" name="f_Pname" id="f_Pname" class="form-control" />
     <br />
     <label>service</label>
	 <select name="f_service" id="f_service" class="form-control"/>
		<option value="Shower" selected>Shower</option>
		<option value="Hair cut" >Hair cut</option>
	 </select>
     <br />
     <label>type</label>
     <select name="f_animal" id="f_animal" class="form-control">
      <option value="dog" selected>Dog</option>
		<option value="cat" >Cat</option>
     </select>
     <br />  
     
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />

    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>






<script>  

function getValueFrom() {
	document.getElementById('resul').innerHTML = document.getElementById('hour').value;
}

$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#f_Pname').val() == "")  
  {  
   alert("Pet Name is required");  
  }  
  else if($('#f_service').val() == '')  
  {  
   alert("service is required");  
  }  
  else if($('#f_animal').val() == '')
  {  
   alert("animal is required");  
  }
   
  else  
  {  
   $.ajax({  
    url:"inserttime.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  
 });


 $(document).on('click', '.view_data', function(){
  //$('#dataModal').modal();
  var employee_id = $(this).attr("id");
  $.ajax({
   url:"select.php",
   method:"POST",
   data:{employee_id:employee_id},
   success:function(data){
    $('#employee_detail').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
});  
 </script>

 -->

</body>
</center>
</html>