<?php
    include "Base/head.php";
    include "SQL/db_connect.php";

    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');

    // $time_offset = 0;
    // if(isset($_COOKIE['time_offset'])) $time_offset = $_COOKIE['time_offset'];
    $field_id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT status, endtime, name FROM fields WHERE id = $field_id";

    $result = $conn->query($sql);
    $fields_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $field = $fields_data[0];
    // $czas = date('Y-m-d H:i', $field['endtime'] + $time_offset);


    // if($field['status'] == "free" && isset($_COOKIE['ID']))
    //     echo "data: <div class='status-free'>FREE</div><input type='hidden' name='id' value={$field_id} /><input name='time_output' for='time' type='text' value='Duration:  0:0' disabled>
    //     <input type='range' name='time' value='10' min='10' max='480' onchange= 'time_output.value =  parseInt(parseInt(time.value)/60) + ':' + parseInt(time.value)%60;' step='5'>
    // <input type='submit' value='Book up' />\n\n";
    //
    // else if($field['status'] == "free" && !isset($_COOKIE['ID']))
    //     echo "data: {$field['status']}\n\n";
    //
    // else if($field['status'] == "occupied" && isset($_COOKIE['ID']))
    //     echo "data: {$field['status']}\n\n";
    //
    // else if($field['status'] == "occupied" && !isset($_COOKIE['ID']))
    //     echo "data: {$field['status']}\n\n";

    echo "data: {$field['status']}\n\n";
    flush();
?>
