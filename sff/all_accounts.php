<?php
    include "SQL/db_connect.php";
    include "Base/head.php";

    if (isset($_COOKIE['sff_admin'])):?>
<header>
    <h1>Sports Fields Finder</h1>
    <a href="index.php"><img src="img/logo.png" alt="logo" /></a>
    <h2>Update an existing account</h2>
</header>

<nav>
    <a href="admin_panel.php">Admin panel</a> &raquo;
    <a href="#">All acounts</a>
</nav>

<section>
    <ul class="fields-container">
    <?php
    $status = 'free';
    $sql = "SELECT id, username, email, rank FROM users";
    $result = $conn->query($sql);
    $users_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($users_data as $user):
        if($user['rank'] == 'admin') $status = 'occupied';
        else $status = 'free';?>
        <a href="update_account.php?id=<?= $user['id']?>">
            <li class="<?=$status?>">
                [<?= $user['id']?>] <?= $user['username']?> | <?= $user['email']?>
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
