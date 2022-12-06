<?php
    session_start();
    require_once "../php/SQL.php";
    require_once "../php/Post.php";

    if(! isset($_SESSION["sid"])) {
        require_once "../pages/Error403.php";
        exit(403);
    }

    $sql = "select * from v_advisor a join (select advisor_id from student where sid = ?) as s on a.aid = s.advisor_id;";
    $res = query($sql, $_SESSION["sid"]);

    if ($res === false) {
        echo "0 results :(";
    } else {
        $res = $res->fetch_assoc(); ?>
<table class="table">
    <tr>
        <th>Name</th>
        <th>Department</th>
        <th>Telephone</th>
        <th>Room Number</th>
    </tr>
    <tr>
        <td><?=$res["fname"].' '.$res["lname"]?></td>
        <td><?=$res["department"]?></td>
        <td><?=$res["telenum"]?></td>
        <td><?=$res["room"]?></td>
    </tr>
</table>
<?php } ?>
