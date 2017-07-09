<?php
    include "SQL/db_connect.php";
    include "Base/head.php";

    $fieldid = mysqli_real_escape_string($conn, $_GET['id']);
 ?>

 <header>
     <h1>Sports Fields Finder</h1>
     <a href="index.php"><img src="img/logo.png" alt="logo" /></a>
     <h2>CREATE ACCOUNT</h2>
 </header>

<section>
    <form class="form" action="_create.php?id=<?=$fieldid?>" method="post">
                <label for="username">Username:</label>
                <input required type="text" class="form-control" name="username">
                <label for="password">Password:</label>
                <input required type="password" class="form-control" name="password">
                <label for="email">Email:</label>
                <input required type="email" class="form-control" name="email">

                <div class="form-buttons">
                     <a class="submit" href="login.php?id=<?=$fieldid?>">LOGIN</a>
                      <input type="submit" class="submit" value="Create">
                </div>
    </form>
       <nav>
           <a href="details.php?id=<?=$fieldid?>">Back</a>
       </nav>
</section>

 <?php include "Base/foot.php";?>
