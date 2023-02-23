<?php
session_save_path("./session");
session_start();
session_destroy();

echo "<font color='red'><h3>LOGOUT<h3/></font>\n";

// redirect to Login page
echo "<meta http-equiv='Refresh' content='2;url=index.php'>";
?>
