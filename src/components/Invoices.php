<?php
    session_start();
    require_once "../php/SQL.php";
    require_once "../php/Post.php";

    if (isset($_SESSION["sid"]))
        $sql = "select * from invoice i join (select lid from lease where student_id = {$_SESSION['sid']}) as l on l.lid=i.lease_id";
    elseif (isset($_SESSION["hid"]))
        $sql = "SELECT * FROM `Invoice`";
    else {
        require_once "../pages/Error403.php";
        exit(403);
    }

    $result = query($sql);

    if ($result->num_rows > 0) { ?>
        <table class="table">
            <tr>
                <th>IID</th>
                <th>Lease ID</th>
                <th>Amount</th>
                <th>Payment Date</th>
            </tr>
<?php       while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?=$row["iid"]?></td>
                    <td><?=$row["lease_id"]?></td>
                    <td><?=$row["paydue"]?></td>
                    <td><?=$row["paid_date"]?></td>
                </tr>
<?php       } ?>            
        </table>
<?php } else { ?>
        <p>0 results</p>
<?php } ?>
