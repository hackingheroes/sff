<?php
    include "Base/head.php";
    include "SQL/db_connect.php";

    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');


    $time_offset = 0;
    if(isset($_COOKIE['time_offset'])) $time_offset = $_COOKIE['time_offset'];
    $field_id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT status, endtime, name FROM fields WHERE id = $field_id";

    $result = $conn->query($sql);
    $fields_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $field = $fields_data[0];
    $czas = date('Y-m-d H:i', $field['endtime'] + $time_offset);

    if($field['status'] == 'occupied')
        echo "data: <li class='{$field['status']}'><span>{$field['name']}</span> <span class='status' id='status_{$field['id']}'>{$field['status']} untill {$czas}</span></li></a>\n\n";
    else
        echo "data: <li class='{$field['status']}'><span>{$field['name']}</span> <span class='status' id='status_{$field['id']}'>{$field['status']}</span></li></a>\n\n";
    flush();
?>
