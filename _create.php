<?php
include "Base/head.php";
include "SQL/db_connect.php";


$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$email    = mysqli_real_escape_string($conn,$_POST['email']);
$fieldid  = mysqli_real_escape_string($conn,$_GET['id']);

$sql = "SELECT username FROM users";

$result = $conn->query($sql);
$students_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

// foreach ($students_data as $student) : {
//     //print_r($student);
//     echo $student['first_name'].' '. $student['last_name'];
//     echo "<br>";
// }

$account_existing = false;


foreach($students_data as $student)
{

    if ($student['username'] == $username)
    {
        echo "<h1 class='title'>SELECT ANOTHER NICKNAME</h1>";
        echo "<header><a href='login.php?id=$fieldid'><h2>BACK</h2></a></header>";
        $account_existing = true;
        break;
    }
}

    if ($account_existing == false)
    {
        echo "<h1 class='title'>ACCOUNT CREATED</h1>";
        echo "<header><a href='login.php?id=$fieldid'><h2>SIGN IN</h2></a></header>";
        $sql = "INSERT INTO users (
            username,
            password,
            email
            ) VALUES
            (
                '$username',
                '$password',
                '$email'
            ) ";
    }

if(!$conn->query($sql))
{
    echo $conn->error ;
}
include "Base/foot.php";
 ?>
