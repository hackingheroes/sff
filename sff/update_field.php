<?php
    include "SQL/db_connect.php";
    include "Base/head.php";

    if (isset($_COOKIE['sff_admin'])):
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT city, position, type, name, status, endtime, starttime, description FROM fields WHERE id = $id";
        $result = $conn->query($sql);
        $fields_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $field = $fields_data[0];
        ?>
<header>
    <h1>Sports Fields Finder</h1>
    <a href="index.php"><img src="img/logo.png" alt="logo" /></a>
    <h2>Update <?= $field['name']?> in <?= $field['city']?> </h2>
</header>

<nav>
    <a href="admin-panel.php">Admin panel</a> &raquo;
    <a href="all_fields.php">All fields</a> &raquo;
    <a href="#">Update a field</a>
</nav>

<section>
    <form class="form" action="_update_field.php?id=<?= $id?>" method="post">
        <label for="field_name">Field name</label>
        <input type="text" name="field_name" value="<?= $field['name']?>" maxlength="30" required="required">
        <select class="" name="field_type">
            <option value="basketball" id="basketball">Basketball</option>
            <option value="football" id="football">Football</option>
        </select>
        <select class="" name="city">
            <option value="Porto" id="Porto">Porto</option>
            <option value="Gaia" id="Gaia">Gaia</option>
            <option value="Kalisz" id="Kalisz">Kalisz</option>
            <option value="Ostrów Wielkopolski" id="Ostrów Wielkopolski">Ostrów Wielkopolski</option>
        </select>
        <select class="" name="field_status">
            <option value="free" id="free">Free</option>
            <option value="occupied" id="occupied">Occupied</option>
        </select>
        <label for="starttime">Reservation start time</label>
        <input type="date" name="starttime" value="<?= date("Y-m-d H:i", $field['starttime'])?>">
        <label for="endtime">Reservation end time</label>
        <input type="date" name="endttime" value="<?= date("Y-m-d H:i", $field['endtime'])?>">
        <textarea name="map_link" rows="8" cols="60" required="required"><?= $field['position']?></textarea>
        <textarea name="description" rows="8" cols="60" placeholder="Field description"><?= $field['description']?></textarea>
        <div class="form-buttons">
            <input type="submit" name="submit" value="Update">
            <a href="all_fields.php">Cancel</a>
        </div>
    </form>
    <script type="text/javascript">
        document.getElementById("<?=$field["type"]?>").selected="selected";
        document.getElementById("<?=$field["city"]?>").selected="selected";
        document.getElementById("<?=$field["status"]?>").selected="selected";
    </script>
</section>
<?php
    else: header("Location: admin_login.php");
    endif;
    include "Base/foot.php";
?>
