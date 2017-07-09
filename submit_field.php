<?php
    include "Base/head.php";
    include 'SQL/db_connect.php';

    if(isset($_COOKIE['ID']) || isset($_COOKIE['sff_admin']) ): ?>
        <a onclick="log_out();" ontouch="log_out();" ontouch="log_out();" id="log-out" href="#">LOG OUT</a>
    <?php endif;
    if (isset($_COOKIE['sff_admin'])):
?>
<header>
    <h1>Sports Fields Finder</h1>
    <a href="index.php"><img src="img/logo.png" alt="logo" /></a>
</header>
<nav>
    <a href="admin_panel.php">Admin panel</a> &raquo;
    <a href="all_fields.php">All fields</a> &raquo;
    <a href="#">New field</a>
</nav>
 <section>
 <?php
    $field_name          = mysqli_real_escape_string($conn, $_POST["field_name"]);
    $field_type          = mysqli_real_escape_string($conn, $_POST["field_type"]);
    $city                = mysqli_real_escape_string($conn, $_POST["city"]);
    $map_link            = mysqli_real_escape_string($conn, $_POST["map_link"]);
    $description         = mysqli_real_escape_string($conn, $_POST["description"]);
    $field_existing = false;

    $sql = "SELECT position, type FROM fields where name = '$field_name'";
    $result = $conn->query($sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($result as $field)
    {
        if($field['position'] == $map_link && $field_type == $field['type'])
        $field_existing = true;
    }
    if ($field_existing) echo "<p style='text-align:center'>The field already exists.</p>";
    else
    {
        $sql = "INSERT INTO fields
        (
            name,
            type,
            city,
            position,
            description,
            status,
            starttime,
            endtime
        )
        VALUES
        (
            '$field_name ',
            '$field_type',
            '$city',
            '$map_link',
            '$description',
            'free',
            0,
            0
        )";

        if ($conn->query($sql)) echo "<p style='text-align:center'>The field has been succesfully added.</p>";
        else echo "<p style='text-align:center'>Sth went wrong: ".$conn->error."</p>";
        echo "<a href='all_fields.php' class='back-button'>BACK</a>";
    }
 ?>
</section>
<?php 
    else: header("Location: admin_login.php");
    endif;
    include "Base/foot.php";
?>
