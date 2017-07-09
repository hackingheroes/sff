<?php
    include "Base/head.php";
    include 'SQL/db_connect.php';

    if (isset($_COOKIE['sff_admin'])):
        $id = mysqli_real_escape_string($conn, $_GET['id']);?>
    <header>
        <h1>Sports Fields Finder</h1>
        <a href="index.php"><img src="img/logo.png" alt="logo" /></a>
    </header>
    <nav>
        <a href="admin_panel.php">Admin panel</a> &raquo;
        <a href="all_accounts.php">All accounts</a> &raquo;
        <a href="#">New acount</a>
    </nav>
     <section>
     <?php
        $user_name    = mysqli_real_escape_string($conn, $_POST["user_name"]);
        $rank         = mysqli_real_escape_string($conn, $_POST["rank"]);
        $email        = mysqli_real_escape_string($conn, $_POST["email"]);
        $password     = mysqli_real_escape_string($conn, $_POST["password"]);

        if($user_name && $password)
        {
            $sql = "INSERT INTO users
            (
                username,
                password,
                email,
                rank
            )
            VALUES
            (
                '$user_name',
                '$password',
                '$email',
                '$rank'
            )";

            if ($conn->query($sql)) echo "<p style='text-align:center'>The account has been succesfully created.</p>";
            else echo "<p style='text-align:center'>Sth went wrong: ".$conn->error."</p>";
        }
        else echo "<p style='text-align:center'>Incorrect data.</p>";
        echo "<div class='reservation'><a href='all_accounts.php'>BACK</a></div>";
     ?>
    </section>

<?php
    else: header("Location: admin_login.php");
    endif;
    include "Base/foot.php";
?>
