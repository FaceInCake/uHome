<?php
    if (! isset($_SESSION["sid"]))
        header("location: Error403");
?>

<h2>Student Homepage</h2>
<br>
<?php
    require_once "php/SQL.php";
    $res = query("select fname, lname from student where sid = ?;", $_SESSION["sid"]);
    $res = $res->fetch_assoc();
?>
<em>Welcome <?=$res['fname']?> <?=$res['lname']?></em><hr>


<a href="Invoices">
    <button class="btn btn-primary">View Invoices</button>
</a>

<br><br>

<a href="Rooms">
    <button class="btn btn-primary">My Room</button>
</a>

<br><br>

<a href="ViewAdvisor">
    <button class="btn btn-primary">My Advisor</button>
</a>
