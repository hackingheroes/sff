<?php
    include "SQL/db_connect.php";
    include "Base/head.php";


    if(isset($_COOKIE['ID']) || isset($_COOKIE['sff_admin']) ): ?>
    <a onclick="log_out();" ontouch="log_out();" ontouch="log_out();" id="log-out" href="#">LOG OUT</a>
    <?php endif;
    if (isset($_COOKIE['sff_admin'])):?>
<header>
    <h1>Sports Fields Finder</h1>
    <a href="index.php"><img src="img/logo.png" alt="logo" /></a>
    <h2>Update an existing field</h2>

</header>

<nav>
    <a href="admin_panel.php">Admin panel</a> &raquo;
    <a href="#">All fields</a>
</nav>

<section>
    <ul class="fields-container">
    <?php
    $sql = "SELECT id, name, city, status, type, last_modifier FROM fields";
    $result = $conn->query($sql);
    $fields_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($fields_data as $field):
        $user_id = $field['last_modifier'];
        $sql = "SELECT username FROM users WHERE id=$user_id";
        $result = $conn->query($sql);
        $users_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $user = $users_data[0];?>
        <a href="update_field.php?id=<?= $field['id']?>">
            <li class="<?=$field['status']?>" id="li_<?=$field['id']?>">
                [<?= $field['id']?>] <?= $field['name']?> | <?= $field['city']?> | <?= $field['type']?> | last mod by <a href="update_account.php?id=<?=$user_id?>" id="a_<?=$field['id']?>"><?=$user['username']?></a>
            </li>
        </a>
        <script type="text/javascript">
            if(typeof(EventSource) !== "undefined")
            {
                var source = new EventSource("all_fields_updater.php?id=<?= $field['id']?>");
                source.onmessage = function(event)
                {
                    document.getElementById("li_<?=$field['id']?>").className = event.data;
                };
                // var mod_source = new EventSource("modifier_updater.php?id=<?= $field['id']?>");
                // source.onmessage = function(event)
                // {
                //     document.getElementById("a_<?=$field['id']?>").href = "update_account.php?id=" + event.data;
                //     document.getElementById("a_<?=$field['id']?>").innerHTML = "[user_id = " + event.data + "]";
                // };
            }
        </script>
    <?php endforeach;
    if(!$conn->query($sql)) echo "Whooops: ".$conn->error ;
    ?>
    </ul>
</section>

<?php
    else: header("Location: admin_login.php");
    endif;
    include "Base/foot.php";
?>
