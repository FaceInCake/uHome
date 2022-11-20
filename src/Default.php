<?php
    if ($_SERVER["REQUEST_URI"] === "/")
        $_SERVER["REQUEST_URI"] = "Home.php";
    $RNAME = substr(explode(".", $_SERVER["REQUEST_URI"], 2)[0], 1);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="theme-color" content="#160f4c" />
        <meta name="description" conent="University of Windsors Hostel Office Website" />
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <script src="jquery-3.6.1.js"></script>
        <script src="bootstrap-4.3.1-dist/boostrap.js"></script>
        <link rel="stylesheet" href="bootstrap-4.3.1-dist/boostrap.css">
        <title>uHome | <?php echo $RNAME ?></title>
    </head>
    <body>
        <noscript>You need to enable JavaScript to run this app.</noscript>
        <div id="root">
            <?php
                $R = $_SERVER["REQUEST_URI"]; // Easier typing
                if ($R === "/".basename(__FILE__))
                    echo "Hey! You can't request the template file, that would be an infinite loop! What are you trying to pull? >:(";
                elseif (is_readable($R))
                    require_once $R;
                else {
                    require_once "Error404.php";
                }
            ?>
        </div>
    </body>
</html>
