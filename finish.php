<?php
session_save_path("./session");
session_start(); 
include_once("chk_session_timeout.php"); // 3.3 1800sec
unset($_SESSION["date"]);
unset($_SESSION["ID"]);
unset($_SESSION["CPhone"]);
unset($_SESSION["Cfirstname"]);
unset($_SESSION["Clastname"]);
unset($_SESSION["A_ID"]);

echo "<meta http-equiv='Refresh' content='0;url=home.php'>\n";

?>