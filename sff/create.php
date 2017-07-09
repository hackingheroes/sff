<?php
    include "SQL/db_connect.php";
    include "Base/head.php";


    $fieldid = mysqli_real_escape_string($conn, $_GET['id']);
 ?>

 <header>
     <h1 class="title">LOGIN</h1>
 </header>

 <nav class="navbar">
     <ul class="nav">
         <li style="margin-top: 50px;"></li>
         <li style="font-size: 1.4em;">MENU</li>
         <div class="nav-li">
             <li><a href="details.php?id=<?=$fieldid?>"><div class="circle"></div></a></li>
         </div>
     </ul>
 </nav>

<section>
    <form class="form" action="_create.php?id=<?=$fieldid?>" method="post">
                <label for="username">Username:</label>
                <input required type="text" class="form-control" name="username">
                <label for="password">Password:</label>
                <input required type="password" class="form-control" name="password">
                <label for="email">Email:</label>
                <input required type="email" class="form-control" name="email">

                <div class="form-buttons">
                     <input type="submit" class="submit" value="CREATE">
                     <a class="submit" href="login.php?id=<?=$fieldid?>">LOGIN</a>
                  </div>

         </div>
    </form>
</section>



 <?php
     include "Base/foot.php";
  ?>
