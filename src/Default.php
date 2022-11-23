<?php
    if ($_SERVER["REQUEST_URI"] === "/")
        $RNAME = "Home";
    else
        $RNAME = substr($_SERVER["REQUEST_URI"], strpos($_SERVER["REQUEST_URI"], "/")?:0);
    $R = "./pages/" . $RNAME . ".php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="theme-color" content="#160f4c" />
        <meta name="description" conent="University of Windsors Hostel Office Website" />
        <link rel="manifest" href="./manifest.json" />
        <link rel="apple-touch-icon" href="./images/Icon.png" />
        <link rel="icon" href="./images/Icon.ico" type="image/x-icon">
        <script src="./jquery-3.6.1.js"></script>
        <script src="./bootstrap/js/bootstrap.js"></script>
        <!-- FontAwesome4 Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="css/Default.css">
        <title>uHome | <?=$RNAME?></title>
    </head>
    <body>
        <noscript>You need to enable JavaScript to run this app.</noscript>
        <div id="root">

            <?php require_once "components/Navbar.php"; ?>

            <div id="content" class="col-lg-6 mx-auto center">
                <?php
                    if ($_SERVER["REQUEST_URI"] === "/".basename(__FILE__)) {
                        http_response_code(400);
                        echo "Hey! You can't request the template file, that would be an infinite loop! What are you trying to pull? >:(";
                    } elseif (is_readable($R))
                        require_once $R;
                    else {
                        http_response_code(404);
                        require_once "./pages/Error404.php";
                    }
                ?>
            </div>

        </div>
    </body>
</html>
