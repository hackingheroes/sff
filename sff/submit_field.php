<?php
    include "Base/head.php";
    include 'SQL/db_connect.php';
?>
<body>
    <header>
        <h1>Sports Fields Finder</h1>
        <img src="img/logo.png" alt="logo" />
    </header>
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
        $result = mysqli_real_escape_string($conn, $result, MYSQLI_ASSOC);
        foreach ($result as $field)
        {
            if($field['position'] == $map_link && $field_type == $field['type'])
            $field_existing = true;
        }
        if ($field_existing) echo "<p>The field already exists.</p>";
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

            if ($conn->query($sql)) echo "<p>The field is added succesfully.</p>";
            else echo "<p>Sth went wrong: ".$conn->error."</p>";
        }
     ?>
    </section>
</body>
<?php include "Base/foot.php";?>
