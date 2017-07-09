<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="authors" content="Hacking Heroes">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sports Field Finder</title>

        <!-- LINKS -->
        <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
        <link href="https://fonts.googleapis.com/css?family=Khand" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Rajdhani" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lemon" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">


        <!-- MOBILE APP SHORTCUT ICONS -->
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon" />
        <link href="img/apple-touch-icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />
        <link href="img/apple-touch-icon-167x167.png" rel="apple-touch-icon" sizes="167x167" />
        <link href="img/apple-touch-icon-180x180.png" rel="apple-touch-icon" sizes="180x180" />
        <link href="img/icon-hires.png" rel="icon" sizes="192x192" />
        <link href="img/icon-normal.png" rel="icon" sizes="128x128" />

        <!-- SCRIPTS -->
        <?php if(!isset($_COOKIE['time_offset'])):?>
        <script type="text/javascript">
            var time_offset = new Date().getTimezoneOffset() * -60;
            var d = new Date();
            d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));
            var expires = "expires="+d.toUTCString();
            document.cookie = 'time_offset' + "=" + time_offset + ";" + expires + ";path=/";
        </script>
        <?php endif;?>
        <script type="text/javascript">
            function log_out()
            {
                document.cookie = 'ID' + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                document.cookie = 'user_id' + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                document.cookie = 'sff_admin' + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                document.getElementById('log-out').style.display="none";
                location.reload();
            }
        </script>

    </head>
    <body>
