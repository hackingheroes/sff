<?php
    include "SQL/db_connect.php";
    include "Base/head.php";
    $admin_logged_in = false;

    if (isset($_COOKIE['sff_admin'])) $admin_logged_in = true;
    else
    {
        $user_name      = mysqli_real_escape_string($conn,$_POST['user_name']);
        $user_password  = mysqli_real_escape_string($conn,$_POST['user_password']);

        $sql = "SELECT rank, password FROM users WHERE username='$user_name'";

        $result = $conn->query($sql);
        $students_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $student = $students_data[0];

        if ($student['rank'] == 'admin' && $student['password'] == $user_password)
        {
            $hash = hash('sha256', $user_name.':'.$user_password);
            setcookie("sff_admin", $hash , time()+3600);
            setcookie("user_id", $student['id'] , time()+3600);
            $admin_logged_in = true;
        }
    }

    if(isset($_COOKIE['ID']) || isset($_COOKIE['sff_admin']) ): ?>
        <a onclick="log_out();" ontouch="log_out();" ontouch="log_out();" id="log-out" href="#">LOG OUT</a>
    <?php endif;

    if($admin_logged_in):?>
<header>
    <h1>Sports Fields Finder</h1>
    <a href="index.php"><img src="img/logo.png" alt="logo" /></a>
    <h2>Admin panel</h2>
</header>

<section>

    <ul class="fields-container">
        <a href="add_field.php"><li class="free">Add a new field</li></a>
        <a href="all_fields.php"><li class="free">Update an existing field</li></a>
        <a href="add_account.php"><li class="free">Create a new account</li></a>
        <a href="all_accounts.php"><li class="free">Update an existing account</li></a>
    </ul>

</section>
<?php
    else: header("Location: admin_login.php");
    endif;
    include "Base/foot.php";
?>
