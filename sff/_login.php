<?php
include 'SQL/db_connect.php';
include "Base/head.php";


$fieldid = mysqli_real_escape_string($conn, $_GET['id']);
?>

<header>
    <h1 class="title">BAD PASSWORD OR USERNAME</h1>
</header>
<div style="text-align: center;" class="form-buttons">
      <a class="submit" href="login.php?id=<?=$fieldid?>">BACK</a>
  </div>


<?php


if (!isset($_POST['username']))

{
    echo "Nie podales nazwy uzytkownika!";
}


if (!isset($_POST['password']))
{
    echo "Nie podales nazwy hasla!";
}


if (isset($_POST['password']) && isset($_POST['username']))

{

$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = mysqli_real_escape_string($conn,$_POST['password']);


$sql = "SELECT username, password FROM users WHERE username='$username'";

$result = $conn->query($sql);
$students_data = mysqli_fetch_all($result, MYSQLI_ASSOC);



foreach($students_data as $student)
{

    if ($student['username'] == $username && $student['password'] == $password)
    {
        $hash = hash('sha256', $username.':'.$password);
        setcookie("ID", $hash , time()+3600);
        header('Location: details.php?id='.$fieldid);
        break;
    }
}

}


?>
