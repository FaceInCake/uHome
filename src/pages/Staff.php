<?php
    if (! isset($_SESSION["hid"]))
        header("location: Error403");
?>

<h2>Staff Dashboard</h2>
<br>
<?php
    require_once "php/SQL.php";
    $res = query("select fname, lname from staff where hid = ?;", $_SESSION["hid"]);
    $res = $res->fetch_assoc();
?>
<em>Welcome <?=$res['fname']?> <?=$res['lname']?></em><hr>


<a href="Invoices">
    <button class="btn btn-primary">View All Invoices</button>
</a>
<br><br>
<a href="PlacedStudents">
    <button class="btn btn-primary">View All Placed Students</button>
</a>
<br><br>
<a href="Rooms">
    <button class="btn btn-primary">View All Rooms</button>
</a>
<br><br>
<a href="GenerateInvoices">
    <button class="btn btn-primary">Generate New Invoices</button>
</a>
<br><br>
<a href="AddStudent">
    <button class="btn btn-primary">New Student</button>
</a>
