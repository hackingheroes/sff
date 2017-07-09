<?php
    include "Base/head.php";
    include "SQL/db_connect.php";

    header('Content-Type: text/event-stream');
    header('Cache-Control: no-cache');

    $sql = "SELECT status, name FROM fields";

    $result = $conn->query($sql);
    $fields_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($fields_data as $field)
    {
        if ($field['status'] == 'occupied')
        {
            echo "data: {$field['name']} has now been occupied\n\n";
            flush();
        }

        else if($field['status'] == 'free')
        {
            echo "data: {$field['name']} has now been free\n\n";
            flush();
        }
    }
?>
<script type="text/javascript">
    var notification_enabled = false;
    if("Notification" in window)
    {
        if(Notification.permission === "granted") notification_enabled = true;
        else if (Notification.permission !== 'denied')
        {
            Notification.requestPermission
            (
                function (permission)
                {
                    if (permission === "granted") notification_enabled = true;
                    else notification_enabled = false;
                }
            );
        }
    }
    if(typeof(EventSource) === "undefined")
    {
        notification_enabled = false;
    }
    if(notification_enabled)
    {
        var source = new EventSource("notifier.php");
        source.onmessage = function(event)
        {
            var notification = new Notification(event.data);
        };
    }
</script>
