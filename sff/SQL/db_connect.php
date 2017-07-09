<?php

$servername = "sff.hackingheroes.org";
$username = "sff";
$password = "Vktl79!7";
$dbname ="admin_sff";

//connect to database
$conn = new mysqli($servername,$username,$password,$dbname);
$conn->set_charset("utf8");


//check connection
if($conn->connect_error){
    die("Ooooops: " . $conn->connect_error);
}

 ?>
