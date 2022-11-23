<?php

    if (isset($_SESSION["sid"]))
        $sql = "select * from invoice i join (select lid from lease where student_id = {$_SESSION['sid']}) as l on l.lid=i.lease_id";
    elseif (isset($_SESSION["hid"]))
        $sql = "SELECT * FROM `Invoice`";
    else {
        header("location: Error403");
    }
    require_once "php/SQL.php";
    $result = query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='table'>";
        echo  "<th>" . 'IID' . "</th>" . '<th>' . 'Lease ID' . '</th>' . '<th>' . 'Amount' . '</th>' . '<th>' . 'Payment Date' . "</th>" . "<th></th><th></th>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {

            echo  "<tr><td>" . $row["iid"] . "</td>" . '<td>' . $row["lease_id"] . '</td>' . '<td>' . $row["paydue"] . '</td>' . '<td>' . $row["paid_date"] .
                "</td><td><button type=\"button\" class=\"btn btn-primary\">Edit</button></td><td>
                <form method=\"post\"><input class=\"btn btn-primary\" type=\"submit\" name=\"button\" value=\"Print " . $row["iid"] . "\"/></form></td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
?>
