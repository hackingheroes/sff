<?php
    include "Base/head.php";
    include "SQL/db_connect.php";
    $type = mysqli_real_escape_string($conn,$_GET['type']);
?>

<header>
    <h1>Sports Fields Finder</h1>
    <a href="index.php"><img src="img/logo.png" alt="logo" /></a>
    <h2>Choose your city</h2>

    <?php if(isset($_COOKIE['ID']) || isset($_COOKIE['sff_admin']) ): ?>
    <a onclick="log_out();" ontouch="log_out();" ontouch="log_out();" id="log-out" href="#">LOG OUT</a>
    <?php endif; ?>

</header>

<nav>
    <a href="index.php"><?= $type ?></a> &raquo;
    <a href="#">City</a>
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

<?php include 'Base/foot.php'; ?>
</body>
</html>
