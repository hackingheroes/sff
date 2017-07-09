<?php
    include "Base/head.php";
    include 'SQL/db_connect.php';

    if(isset($_COOKIE['ID']) || isset($_COOKIE['sff_admin']) ): ?>
        <a onclick="log_out();" ontouch="log_out();" ontouch="log_out();" id="log-out" href="#">LOG OUT</a>
    <?php endif;
    if (isset($_COOKIE['sff_admin'])):
        $id = mysqli_real_escape_string($conn, $_GET['id']);?>
    <header>
        <h1>Sports Fields Finder</h1>
        <a href="index.php"><img src="img/logo.png" alt="logo" /></a>

    </header>
    <nav>
        <a href="admin_panel.php">Admin panel</a> &raquo;
        <a href="all_accounts.php">All fields</a> &raquo;
        <a href="#">Field removal</a>
    </nav>
     <section>
     <?php

     $sql = "DELETE FROM fields WHERE id = $id ";

    if ($conn->query($sql)) echo "<p style='text-align:center'>The field has been succesfully removed.</p>";
    else echo "<p style='text-align:center'>Sth went wrong: ".$conn->error."</p>";
    echo "<a href='all_fields.php' class='back-button'>BACK</a>";
     ?>
    </section>

<?php
    else: header("Location: admin_login.php");
    endif;
    include "Base/foot.php";
?>
