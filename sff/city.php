<?php
    include "Base/head.php";
    include "SQL/db_connect.php";
    $type = mysqli_real_escape_string($conn,$_GET['type']);
?>
<header>
    <h1 class="title">SELECT YOUR CITY</h1>
</header>

<nav class="navbar">
    <ul class="nav">
        <li style="margin-top: 50px;"></li>
        <li style="font-size: 1.4em;">MENU</li>
        <div class="nav-li">
            <li><a href="index.php"><div class="circle"></div></a></li>
        </div>
    </ul>
</nav>

<article>
    <section class="squared">
        <a class="square" style="background-image:url('img/porto.jpg')" href="fields_list.php?location=Porto&type=<?= $type ?>">
            Porto
        </a>
        <a class="square" style="background-image:url('img/gaia.jpg')" href="fields_list.php?location=Gaia&type=<?= $type ?>">
            Gaia
        </a>
        <a class="square" style="background-image:url('img/kalisz.jpeg')" href="fields_list.php?location=Kalisz&type=<?= $type ?>">
            Kalisz
        </a>
        <a class="square" style="background-image:url('img/ostrow.jpg')" href="fields_list.php?location=Ostrów%20Wielkopolski&type=<?= $type ?>">
            Ostrów Wlkp.
        </a>
    </section>
</article>
<?php
    include "Base/foot.php";
?>
