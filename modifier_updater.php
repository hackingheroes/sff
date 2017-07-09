<?php
    include "Base/head.php";
    include "SQL/db_connect.php";

    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');

    $field_id = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "SELECT last_modifier FROM fields WHERE id = $field_id";

    $result = $conn->query($sql);
    $fields_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $field = $fields_data[0];

    echo "data: {$field['last_modifier']}\n\n";
    flush();
?>
