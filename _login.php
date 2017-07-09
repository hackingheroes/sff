<?php
include 'SQL/db_connect.php';
include "Base/head.php";
?>

<header>
    <h1>Sports Fields Finder</h1>
    <a href="index.php"><img src="img/logo.png" alt="logo" /></a>
</header>


<?php

$fieldid = mysqli_real_escape_string($conn, $_GET['id']);

if (!isset($_POST['username']))
{
    echo "Nie podales nazwy uzytkownika!";
}


if (!isset($_POST['password']))
{
    echo "Nie podales hasla!";
}


if (isset($_POST['password']) && isset($_POST['username']))
{
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $sql = "SELECT username, password, id FROM users WHERE username='$username'";

    $result = $conn->query($sql);
    $students_data = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach($students_data as $student)
    {
        if ($student['username'] == $username && $student['password'] == $password)
        {
            $hash = hash('sha256', $username.':'.$password);
            setcookie("ID", $hash , time()+3600);
            setcookie("user_id", $student['id'] , time()+3600);
            header('Location: details.php?id='.$fieldid);
            break;
        }
    }

    echo "<h2 class='form-title'>WRONG PASSWORD OR NICKNAME</h1>";
    echo "<a style='text-align: center;' href='login.php?id=$fieldid'><h3>BACK</h3></a>";
}

?>
