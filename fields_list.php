<?php
    include "Base/head.php";
    include "SQL/db_connect.php";
    $location = mysqli_real_escape_string($conn, $_GET['location']);
    $type = mysqli_real_escape_string($conn, $_GET['type']);
    if(isset($_COOKIE['time_offset'])) $time_offset = $_COOKIE['time_offset'];
?>

<header>
    <h1>Sports Fields Finder</h1>
    <a href="index.php"><img src="img/logo.png" alt="logo" /></a>
    <h2><span style="text-transform: capitalize;"><?= $type?></span> fields list in <?= $location?></h2>

    <?php if(isset($_COOKIE['ID']) || isset($_COOKIE['sff_admin']) ): ?>
    <a onclick="log_out();" ontouch="log_out();" ontouch="log_out();" id="log-out" href="#">LOG OUT</a>
    <?php endif; ?>

</header>

<nav>
    <a href="index.php"><?= $type ?></a> &raquo;
    <a href="city.php?type=<?= $type?>"><?= $location?></a> &raquo;
    <a href="#">Fields</a>
</nav>

<article>
    <section>
        <ul class="fields-container">
        <?php
            $sql = "SELECT id, name, status, endtime  FROM fields WHERE city='$location' AND type = '$type'";

            $result = $conn->query($sql);
            $fields_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

            foreach($fields_data as $field):?>
                <a href="details.php?id=<?= $field['id']?>" id="a_<?= $field['id']?>">
                    <li class="<?=$field['status']?>">
                        <span><?= $field['name']?></span>
                        <span class="status" id="status_<?= $field['id']?>">
                            <?php
                            if($field['status'] == 'occupied')
                            echo $field['status']." untill ".date("Y-m-d H:i", $field['endtime'] + $time_offset);
                            else echo $field['status'];
                            ?>
                        </span>
                    </li>
                </a>
                <script type="text/javascript">
                    if(typeof(EventSource) !== "undefined")
                    {
                        var source = new EventSource("status_updater.php?id=<?= $field['id']?>");
                        source.onmessage = function(event)
                        {
                            document.getElementById("a_<?= $field['id']?>").innerHTML = event.data;
                        };
                    }
                </script>
            <?php endforeach;
            if(!$conn->query($sql)) echo $conn->error ;
        ?>
        </ul>
    </section>
</article>

<?php
    include "Base/foot.php";
    $sql = "SELECT id,starttime, endtime FROM fields WHERE city='$location' AND type = '$type'";
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
