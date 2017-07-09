<?php
    include "Base/head.php";
    include "SQL/db_connect.php";

    $fieldid = mysqli_real_escape_string($conn, $_GET['id']);
    if(isset($_COOKIE['time_offset'])) $time_offset = $_COOKIE['time_offset'];

    $sql = "SELECT endtime, name, description, position, status, type, city FROM fields WHERE id=$fieldid";

    $result = $conn->query($sql);
    $fields_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $field = $fields_data[0];
    $type = $field['type'];

    if(!$conn->query($sql))
    {
        echo $conn->error ;
    }

?>

    <h1 class="title"><?=$field['name']?></h1>
    <h2 class="city-title"><?=$field['city']?></h2>

    <?php if(isset($_COOKIE['ID']) || isset($_COOKIE['sff_admin']) ): ?>
    <a onclick="log_out();" ontouch="log_out();" ontouch="log_out();" id="log-out" href="#">LOG OUT</a>
    <?php endif; ?>


    <nav>
        <a href="index.php"><?= $type ?></a> &raquo;
        <a href="city.php?type=<?= $type?>"><?= $field['city']?></a> &raquo;
        <a href="fields_list.php?location=<?= $field['city']?>&type=<?= $type?>">Fields list</a> &raquo;
        <a href="#"><?=$field['name']?></a>
    </nav>

    <div class="map">
        <?=$field['position']?>
    </div>

    <p class="description">
        <strong>More info:</strong>
        <?=$field['description']?>
    </p>


    <form class="reservation" action="_reserv.php" method="GET">
        <?php
            if ($field['status'] == "free"):?>
                <div class="status-free">FREE</div>
        <?php else:
            $date = date("Y-m-d H:i", $field['endtime'] + $time_offset);?>
            <div class="status-occupied">
                OCCUPIED
                <span style="font-size: 0.65em;">
                    TILL <?=$date?>
                </span>
            </div>
        <?php endif; ?>
        <input type="hidden" name="id" value=<?= $fieldid ?> />


        <?php if(isset($_COOKIE['ID']))
        {
            if ($field['status'] == "free"):?>
            <!-- <label for="starttime">Beginning: </label>
            <input type="text" name="starttime" value="<?=date("d.m.Y H:i",time() + $time_offset)?>"> -->
                <input name="time_output" for="time" type="text" value="Duration:  0:0" disabled>
                <input type="range" name="time" value="10" min="10" max="480" onchange="time_output.value = 'Duration: ' + parseInt(parseInt(time.value)/60) + ':' + parseInt(time.value)%60;" step="5">
            <input type="submit" value="Book up" />
            <?php else:?>
                <a href="_reserv.php?id=<?=$fieldid?>&time=0">Set it free</a>
            <?php endif;
        }
        else echo '<a href="login.php?id='.$fieldid.'">Change status</a>';
        ?>
    </form>

<script type="text/javascript">
if(typeof(EventSource) !== "undefined")
{
    var status = "<?= $field['status']?>";
    var source = new EventSource("details_updater.php?id=<?= $fieldid?>");
    source.onmessage = function(event)
    {
        if((event.data == "free" && status == "occupied") || (event.data == "occupied" && status == "free")) location.reload();
    };
}
</script>

<?php
    include "Base/foot.php";

    $location = $field['city'];
    $type = $field['type'];

    $sql = "SELECT id, starttime, endtime FROM fields WHERE city='$location' AND type = '$type'";
    $result = $conn->query($sql);
    $fields_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($fields_data as $field)
    {
       if ($field['endtime'] <= time())
       {
           $fieldid = $field['id'];
           $sql = "UPDATE fields SET status='free' WHERE id=$fieldid";
           $result = $conn->query($sql);
       }
    }
 ?>
