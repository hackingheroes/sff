<?php
    include "SQL/db_connect.php";
    include "Base/head.php";

    if (isset($_COOKIE['sff_admin'])):?>
<header>
    <h1>Sports Fields Finder</h1>
    <a href="index.php"><img src="img/logo.png" alt="logo" /></a>
    <h2>Create a new account</h2>
</header>

<nav>
    <a href="admin_panel.php">Admin panel</a> &raquo;
    <a href="all_accounts.php">All accounts</a> &raquo;
    <a href="#">New account</a>
</nav>

<section>
    <form class="form" action="submit_account.php" method="post">
        <label for="user_name">User name</label>
        <input type="text" name="user_name" required="required" placeholder="jabkomuzykant">
        <label for="email">Email address</label>
        <input type="email" name="email" placeholder="you@example.com">
        <label for="password">Password</label>
        <input type="password" name="password" required="required" placeholder="password">
        <select class="" name="rank">
            <option value="other">Other</option>
            <option value="admin">Admin</option>
        </select>
        <div class="form-buttons">
            <input type="submit" name="submit" value="Update">
            <a href="all_accounts.php">Cancel</a>
        </div>
    </form>
</section>
<?php
    else: header("Location: admin_login.php");
    endif;
    include "Base/foot.php";
?>
