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
        <a href="all_fields.php">All fields</a> &raquo;
        <a href="#">Update a field</a>
    </nav>
     <section>
     <?php
        $field_name          = mysqli_real_escape_string($conn, $_POST["field_name"]);
        $field_type          = mysqli_real_escape_string($conn, $_POST["field_type"]);
        $field_status        = mysqli_real_escape_string($conn, $_POST["field_status"]);
        $starttime           = mysqli_real_escape_string($conn, $_POST["starttime"]);
        $endttime            = mysqli_real_escape_string($conn, $_POST["endttime"]);
        $city                = mysqli_real_escape_string($conn, $_POST["city"]);
        $map_link            = mysqli_real_escape_string($conn, $_POST["map_link"]);
        $description         = mysqli_real_escape_string($conn, $_POST["description"]);
        $wrong_params = false;

        $sql = "SELECT id, position, type FROM fields WHERE name = '$field_name'";
        $result = $conn->query($sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($result as $field)
        {
            if($field['position'] == $map_link && $field_type == $field['type'] && $id != $field['id'])
            $wrong_params = true;
        }
        if ($wrong_params) echo "<p style='text-align:center'>There cannot be 2 exactly identical fields.</p>";
        else
        {
            $sql = "UPDATE fields SET
                name = '$field_name',
                type = '$field_type',
                city = '$city',
                position = '$map_link',
                description = '$description',
                status = '$field_status',
                starttime = '$starttime',
                endtime = '$endttime'
            WHERE id = $id";

            if ($conn->query($sql)) echo "<p style='text-align:center'>The field has been succesfully updated.</p>";
            else echo "<p style='text-align:center'>Sth went wrong: ".$conn->error."</p>";
            echo "<div class='reservation'><a href='all_fields.php'>BACK</a></div>";
        }
     ?>
    </section>

<?php
    else: header("Location: admin_login.php");
    endif;
    include "Base/foot.php";
?>
