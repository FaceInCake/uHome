<?php
    session_start();
    require_once "../php/SQL.php";
    require_once "../php/Post.php";

    if (isset($_SESSION["sid"]))
        $res = query("select r.* from v_room r join (select room_id from lease where student_id = ?) as l on r.pid = l.room_id", $_SESSION["sid"]);
    elseif (isset($_SESSION["hid"]))
        $res = query("SELECT * FROM v_room");
    else {
        require_once "../pages/Error403.php";
        exit(403);
    }
    if ($res->num_rows > 0) {
?>
<table class="table">
    <tbody>
        <tr>
            <th>Place Number</th>
            <th>Room Number</th>
            <th>Monthly Rent</th>
            <th>Building Address</th>
        </tr>
<?php   while ($row = $res->fetch_assoc()) { ?>
            <tr>
                <td><?=$row['pid']?></td>
                <td><?=$row['room']?></td>
                <td><?=$row['rent']?></td>
                <td><?=$row['address']?></td>
            </tr>
<?php   } ?>
    </tbody>
</table>
<?php
    } else {
        echo "0 results";
    }
?>
