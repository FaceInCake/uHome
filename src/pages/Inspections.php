<?php
    require_once "php/SQL.php";
    if (isset($_SESSION["hid"]))
        $res = query("SELECT * FROM v_flatinspection");
    else {
        header("location: Error403");
    }
    if ($res->num_rows > 0) {
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
                <td><?=$row['satisfactory']?></td>
                <td><?=$row['flat_bedrooms']?></td>
            </tr>
<?php   } ?>
    </tbody>
</table>
<?php
    } else {
        echo "0 results";
    }
?>
