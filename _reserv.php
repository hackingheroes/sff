<?php
    include "SQL/db_connect.php";
    include "SQL/db_connect.php";

    $fieldid = mysqli_real_escape_string($conn, $_GET['id']);
    $timeform = mysqli_real_escape_string($conn, $_GET['time']);
    if(isset($_COOKIE['user_id'])) $user_id = $_COOKIE['user_id'];

    $sql = "SELECT status, name FROM fields WHERE id=$fieldid";
    $result = $conn->query($sql);
    $field_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $field = $field_data[0];


    if ($field['status'] == 'free')
    {
        $status = 'occupied';
        // echo "data: {$field['name']} has now been occupied\n\n";
        // flush();
    }
    else if($field['status'] == 'occupied')
    {
        $status = 'free';
        // echo "data: {$field['name']} has now been free\n\n";
        // flush();
    }

    $sql = "UPDATE fields SET status='$status' WHERE id=$fieldid";
    $result = $conn->query($sql);

    if(!$conn->query($sql))
    {
        echo $conn->error;
    }
    $starttime = time();

    $endtime = $starttime + $timeform * 60;

    $sql = "UPDATE fields SET starttime='$starttime' WHERE id=$fieldid";
    $result = $conn->query($sql);

    $sql = "UPDATE fields SET endtime='$endtime' WHERE id=$fieldid";
    $result = $conn->query($sql);

    $sql = "UPDATE fields SET last_modifier=$user_id WHERE id=$fieldid";
    $result = $conn->query($sql);

    header('Location: details.php?id='.$fieldid);
 ?>
