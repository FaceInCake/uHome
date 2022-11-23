<?php

    if(! isset($_SESSION["sid"]))
        header("location: Error403");

    require_once "php/SQL.php";

    $sql = "SELECT
            staff.fname AS fname,
            staff.lname AS lname,
            location
        FROM student
        JOIN advisor ON advisor_id = aid
        JOIN staff on aid = hid
        WHERE sid = " . $_SESSION["sid"] . ";";


    echo '<h2>My Advisor</h2>
        <table class="table"> 
        <tr> 
            <td> <font face="Arial">Name</font> </td> 
            <td> <font face="Arial">Location</font> </td> 
        </tr>';

    if ($result = query($sql)) {
        while ($row = $result->fetch_assoc()) {

            echo '<tr> 
                    <td>' . $row["fname"] . ' ' . $row["lname"] . '</td> 
                    <td>' . $row["location"] . '</td>
                </tr>';
        }
        $result->free();
    }

?>