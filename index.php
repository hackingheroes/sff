<?php include "Base/head.php"; ?>
<header>
    <h1>Sports Fields Finder</h1>
    <a href="index.php"><img src="img/logo.png" alt="logo" /></a>
    <h2>Choose your sport</h2>

    <?php if(isset($_COOKIE['ID']) || isset($_COOKIE['sff_admin']) ): ?>
    <a onclick="log_out();" ontouch="log_out();" ontouch="log_out();" id="log-out" href="#">LOG OUT</a>
    <?php endif; ?>

</header>

<article>
    <section class="squared" id="without-nav">
        <a class="square-2" href="city.php?type=basketball" style="background-image: url('img/basketball.jpg');">
            Basketball
        </a>
        <a class="square-2" href="city.php?type=football" style="background-image: url('img/football.jpg');">
            Football
        </a>
    </section>
</article>
</body>
<?php include "Base/foot.php";?>
