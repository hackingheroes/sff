<?php
    include "SQL/db_connect.php";
    include "Base/head.php";

    if(isset($_COOKIE['ID']) || isset($_COOKIE['sff_admin']) ): ?>
        <a onclick="log_out();" ontouch="log_out();" ontouch="log_out();" id="log-out" href="#">LOG OUT</a>
    <?php endif;
    if (isset($_COOKIE['sff_admin'])):?>
<header>
    <h1>Sports Fields Finder</h1>
    <a href="index.php"><img src="img/logo.png" alt="logo" /></a>
    <h2>Add a new field</h2>
</header>

<nav>
    <a href="admin_panel.php">Admin panel</a> &raquo;
    <a href="all_fields.php">All fields</a> &raquo;
    <a href="#">New field</a>
</nav>

<section>
    <form class="form" action="submit_field.php" method="post">
        <label for="field_name">Field name</label>
        <input type="text" name="field_name" value="" placeholder="Pola Marsowe" maxlength="30" required="required">
        <label for="field_type">Field type</label>
        <select class="" name="field_type">
            <option value="basketball">Basketball</option>
            <option value="football">Football</option>
        </select>
        <label for="city">Location of the field</label>
        <select class="" name="city">
            <option value="Porto">Porto</option>
            <option value="Gaia">Gaia</option>
            <option value="Kalisz">Kalisz</option>
            <option value="Ostrów Wielkopolski">Ostrów Wielkopolski</option>
        </select>
        <textarea name="map_link" rows="8" cols="60" placeholder="Link to the google map" required="required"></textarea>
        <textarea name="description" rows="8" cols="60" placeholder="Field description" required="required"></textarea>
        <input type="submit" name="submit" value="Submit">
    </form>
</section>
<?php
    else: header("Location: admin_login.php");
    endif;
    include "Base/foot.php";
?>
