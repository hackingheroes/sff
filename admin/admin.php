<?php
include "../SQL/db_connect.php";

$sql = "UPDATE users SET rank='admin' WHERE username='1mkmk'";

$result = $conn->query($sql);


$sql = "SELECT rank,username FROM users";
$result = $conn->query($sql);

$students_data = mysqli_fetch_all($result, MYSQLI_ASSOC);



foreach($students_data as $student)
{
    echo $student['rank']. "  " $student['username'];
}

?>
