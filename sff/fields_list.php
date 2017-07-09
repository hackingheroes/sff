<?php
    include "Base/head.php";
    include "SQL/db_connect.php";
    $location = mysqli_real_escape_string($conn, $_GET['location']);
    $type = mysqli_real_escape_string($conn, $_GET['type']);
?>
<header>
    <h1 style="padding: 0.3em"class="title">SELECT FIELD</h1>
</header>

<nav class="navbar">
    <ul class="nav">
        <li style="margin-top: 50px;"></li>
        <li style="font-size: 1.4em;">MENU</li>
        <div class="nav-li">
            <li><a href="index.php"><div class="circle"></div></a></li>
            <li><a href="city.php?type=<?= $type?>"><div class="circle"></div></a></li>
        </div>
    </ul>
</nav>

<article>
    <section>
        <ul class="fields-container">
        <?php
            $sql = "SELECT id, name, status, endtime  FROM fields WHERE city='$location' AND type = '$type'";

            $result = $conn->query($sql);
            $fields_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

            foreach($fields_data as $field):?>
                <a href="details.php?id=<?= $field['id']?>">
                    <li class="<?=$field['status']?>">
                        <span><?= $field['name']?></span>
                        <span class="status">
                            <?php
                            if($field['status'] == 'occupied')
                            echo $field['status']." untill ".date("Y-m-d H:i", $field['endtime'] + 7200);
                            else echo $field['status'];
                            ?>
                        </span>
                    </li>
                </a>
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
