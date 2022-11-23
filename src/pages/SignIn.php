<?php
if(isset($_POST["sid"])) {
    require_once "php/LoginAttempt.php";
    $res = attemptLogin();
    if ($res["success"] === true) {
        header("location: /");
    } else {
        $response = $res["message"];
    }
}
elseif (isset($_POST["hid"])) {
    require_once "php/StaffLoginAttempt.php";
    $res = staffAttemptLogin();
    if ($res["success"] === true) {
        header("location: /");
    } else {
        $response = $res["message"];
    }
}

?>

<em><?= $response??"" ?></em>
<br>
<h2>Student Login</h2>
<form class="form" method="post">
    <label>Student ID: </label>
    <input type = "text" name="sid" id="sid" required />
    <br><br>
    <label>Password: </label>
    <input type = "password" id="pass" name="pass" required />
    <br><br>
    <button>Submit</button>
</form>
<br><hr><br>
<h2>Staff Login</h2>
<form class="form" method="post">
    <label>Staff ID: </label>
    <input type = "text" name="hid" id="hid" required />
    <br><br>
    <label>Password: </label>
    <input type = "password" id="pass" name="pass" required />
    <br><br>
    <button>Submit</button>
</form>
