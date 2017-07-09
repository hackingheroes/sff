<?php
    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');


    $tajne_dane = $_GET['tajne_dane'];

    $time = date('r');
    // echo "data: The server time is: {$time}\n\n";
    echo "data: {$tajne_dane}\n\n";
    flush();
    ?>
