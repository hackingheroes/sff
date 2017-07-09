<?php
    include "SQL/db_connect.php";

    $fieldid = mysqli_real_escape_string($conn, $_GET['id']);
    $timeform = mysqli_real_escape_string($conn, $_GET['time']);

    $sql = "SELECT status FROM fields WHERE id=$fieldid";

    $result = $conn->query($sql);
    $field_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $field = $field_data[0];


    if ($field['status'] == 'free')
    {
        $status = 'occupied';
    }

    else
    {
        $status = 'free';
    }


    $sql = "UPDATE fields SET status='$status' WHERE id=$fieldid";

    $result = $conn->query($sql);


    if(!$conn->query($sql))
    {
        echo $conn->error;
    }
    $starttime = time();

    $endtime = $starttime + $timeform * 3600;

    $sql = "UPDATE fields SET starttime='$starttime' WHERE id=$fieldid";
    $result = $conn->query($sql);

    $sql = "UPDATE fields SET endtime='$endtime' WHERE id=$fieldid";
    $result = $conn->query($sql);


    header("Location: details.php?id=".$fieldid);

 ?>
