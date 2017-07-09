<?php
    include "SQL/db_connect.php";
    include "Base/head.php";

    if(isset($_COOKIE['ID']) || isset($_COOKIE['sff_admin']) ): ?>
        <a onclick="log_out();" ontouch="log_out();" ontouch="log_out();" id="log-out" href="#">LOG OUT</a>
    <?php endif;
    if (isset($_COOKIE['sff_admin'])):
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT username, email, password, rank FROM users WHERE id = $id";
        $result = $conn->query($sql);
        $users_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $user = $users_data[0];
        ?>
<header>
    <h1>Sports Fields Finder</h1>
    <a href="index.php"><img src="img/logo.png" alt="logo" /></a>
    <h2>Update <?= $user['username']?> [<?= $id?>] </h2>
</header>
<nav>
    <a href="admin_panel.php">Admin panel</a> &raquo;
    <a href="all_accounts.php">All accounts</a> &raquo;
    <a href="#">Update an account</a>
</nav>
<section>
    <form class="form" action="_update_account.php?id=<?= $id?>" method="post">
        <label for="user_name">User name</label>
        <input type="text" name="user_name" value="<?= $user['username']?>" required="required">
        <label for="email">Email address</label>
        <input type="email" name="email" value="<?= $user['email']?>">
        <label for="password">Password</label>
        <input type="text" name="password" value="<?= $user['password']?>" required="required">
        <label for="rank">Account rank</label>
        <select class="" name="rank">
            <option value="other">Other</option>
            <option value="admin" id="admin">Admin</option>
        </select>
        <div class="form-buttons">
            <input type="submit" name="submit" value="Update">
            <a href="all_accounts.php">Cancel</a>
        </div>
    </form>
    <a href="#confirm_dialog" class="back-button" onclick="document.getElementById('confirm_dialog').style.display='block'">Remove the account</a>
</section>
<div id="confirm_dialog">
    <div class="dialog_body">
        <h2>Are you sure?</h2>
        <p>Account removal CANNOT be undone!</p>
        <div class="form-buttons">
            <a href="account_removal.php?id=<?= $id?>">Proceed</a>
            <a href="#confirm_dialog" onclick="document.getElementById('confirm_dialog').style.display='none'">Cancel</a>
        </div>
    </div>
</div>
<?php
    else: header("Location: admin_login.php");
    endif;
    if ($user["rank"] == "admin")
    echo'<script type="text/javascript">document.getElementById("admin").selected="selected";</script>';
    include "Base/foot.php";
?>
