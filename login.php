<?php
    include "SQL/db_connect.php";
    include "Base/head.php";

    $fieldid = mysqli_real_escape_string($conn, $_GET['id']);
 ?>

 <header>
     <h1>Sports Fields Finder</h1>
     <a href="index.php"><img src="img/logo.png" alt="logo" /></a>
     <h2>Log in to change the status</h2>
 </header>

<section>
    <form class="form" action="_login.php?id=<?=$fieldid?>" method="post">
        <label for="username">Username:</label>
        <input required type="text" class="form-control" name="username">

        <label for="password">Password:</label>
        <input required type="password" class="form-control" name="password">

        <div class="form-buttons">
             <a href="create.php?id=<?=$fieldid?>">CREATE AN ACCOUNT</a>
              <input type="submit" value="LOG IN">
         </div>
    </form>
    <a href="details.php?id=<?=$fieldid?>" class="back-button">BACK</a>
</section>

 <?php include "Base/foot.php"; ?>
