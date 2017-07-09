<?php
include "SQL/db_connect.php";

$fieldid = mysqli_real_escape_string($conn, $_GET['id']);


setcookie ("ID", "", time() - 3600);
header("Location: details.php?id=".$fieldid);

 ?>
