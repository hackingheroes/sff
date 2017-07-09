<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname ="hh_sff";

//connect to database
$conn = new mysqli($servername,$username,$password,$dbname);
$conn->set_charset("utf8");


//check connection
if($conn->connect_error){
    die("Ooooops: " . $conn->connect_error);
}

 ?>
