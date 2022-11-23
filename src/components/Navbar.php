<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- The Brand Icon -->
    <a class="navbar-brand" href="/">
        <img src="images/Icon.ico" alt="Brand Icon" width="48" height="48">
    </a>
    <!-- The Collapse button, may be hidden -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!-- Home button -->
            <li class="nav-item active">
                <a class="nav-link" href="/">
                    <i class="fa fa-home my-auto" aria-hidden="true"></i>
                    Home <span class="sr-only">(current)</span>
                </a>
            </li>
            <!-- Dashboard button OR Sign in -->
            <?php
                $SignIco = "user";
                $SignText = "Dashboard";
                if (isset($_SESSION["sid"])) {
                    $SignUrl = "Student";
                }
                elseif (isset($_SESSION["hid"])) {
                    $SignUrl = "Staff";
                }
                else {
                    $SignIco = "sign-in";
                    $SignText = "Sign In";
                    $SignUrl = "SignIn";
                    // TODO: Sign in modal
                    // require_once "components/SignIn.php";
                }
            ?>
            <li class="nav-item d-flex">
                <a class="nav-link" href="<?=$SignUrl?>">
                    <i class="fa fa-<?=$SignIco?> my-auto" aria-hidden="true"></i>
                    <?=$SignText?>
                </a>
            </li>
            <!-- Other dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-gears my-auto" aria-hidden="true"></i>
                    Other
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="ContactUs">
                        <i class="fa fa-phone my-auto" aria-hidden="true"></i>
                        Contact Us
                    </a>
                    <div class="dropdown-divider"></div>
                    <?php if (isset($_SESSION["sid"]) or isset($_SESSION["hid"])) { ?>
                    <a class="dropdown-item" href="php/Logout.php">
                        <i class="fa fa-sign-out my-auto" aria-hidden="true"></i>
                        Logout
                    </a>
                    <?php } ?>
                </div>
            </li>
        </ul>
    </div>
</nav>
