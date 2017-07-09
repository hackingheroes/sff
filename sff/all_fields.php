<?php
    include "SQL/db_connect.php";
    include "Base/head.php";

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
    $sql = "SELECT id, name, city, status, type FROM fields";
    $result = $conn->query($sql);
    $fields_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($fields_data as $field):?>
        <a href="update_field.php?id=<?= $field['id']?>">
            <li class="<?=$field['status']?>">
                [<?= $field['id']?>] <?= $field['name']?> | <?= $field['city']?> | <?= $field['type']?>
            </li>
        </a>
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
