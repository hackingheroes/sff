<?php include "Base/head.php";?>
<body>
    <header>
        <h1>Sports Fields Finder</h1>
        <a href="index.php"><img src="img/logo.png" alt="logo" /></a>
        <h2>Logging to Admin panel</h2>
    </header>
    <section>
        <form class="form" action="admin_panel.php" method="post">
            <label for="user_name">User name</label>
            <input type="text" name="user_name" value="" maxlength="30" required="required">
            <label for="user_password">Field name</label>
            <input type="password" name="user_password" value="" maxlength="30" required="required">
            <br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </section>
</body>
<?php include "Base/foot.php";?>
