<?php
    session_start();
    require_once "../php/SQL.php";
    require_once "../php/Post.php";

    if (isset($_SESSION["hid"]))
        $res = query("SELECT * FROM v_flatinspection");
    else {
        require_once "../pages/Error403.php";
        exit(403);
    }
?>
<table class="table">
    <tbody>
        <tr>
            <th>Flat Number</th>
            <th>Inspector</th>
            <th>Satisfactory</th>
            <th>Bedrooms</th>
        </tr>
<?php   while ($row = $res->fetch_assoc()) { ?>
            <tr>
                <td><?=$row['fid']?></td>
                <td><?=$row['staff_fname']." ".$row["staff_lname"]?></td>
                <td><?=$row['satisfactory']===1?'Yes':'No'?></td>
                <td><?=$row['flat_bedrooms']?></td>
            </tr>
<?php   } ?>
    </tbody>
</table>
