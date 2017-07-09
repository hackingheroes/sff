<?php
    include "../SQL/db_connect.php";
    include "../Base/head.php";

    $user_name      = mysqli_real_escape_string($conn,$_POST['user_name']);
    $user_password  = mysqli_real_escape_string($conn,$_POST['user_password']);


$sql = "SELECT rank,password FROM users WHERE username='$user_name'";

$result = $conn->query($sql);
$students_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

$student = $students_data[0];

    if ($student['rank'] == 'admin' && $student['password'] == $user_password):?>
<header>
    <h1>Sports Fields Finder</h1>
    <img src="img/logo.png" alt="logo" />
    <h2>Admin panel</h2>
</header>
<section>
    <form class="form" action="submit_field.php" method="post">
        <label for="field_name">Field name</label>
        <input type="text" name="field_name" value="" placeholder="Pola Marsowe" maxlength="30" required="required">
        <select class="" name="field_type">
            <option value="basketball">Basketball</option>
            <option value="football">Football</option>
        </select>
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
    else: header("Location: index.php");
    endif;
    include "../Base/foot.php";
?>
