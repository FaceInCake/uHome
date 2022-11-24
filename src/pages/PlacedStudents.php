<?php 

if (! isset($_SESSION["hid"]))
    header("location: Error403");

include 'php/SQL.php';

$sql = "SELECT
			sid,
			fname,
			lname,
			residencehall.rid,
            studentflat.fid,
			room,
			rent,
			duration,
			leaseDurationDates(lid) AS start_end_dates
		FROM student
		left JOIN lease ON sid = student_id
		left JOIN room ON room_id = pid
		left JOIN building ON room.bid = building.bid
		LEFT JOIN residencehall ON building.bid = residencehall.bid
		LEFT JOIN studentflat ON building.bid = studentflat.bid;";

?>
<h2>Placed Students</h2>
<table class="table"> 
<tr> 
    <td> <font face="Arial">ID</font> </td> 
    <td> <font face="Arial">Name</font> </td> 
    <td> <font face="Arial">Room</font> </td> 
    <td> <font face="Arial">Monthly Rent</font> </td>
    <td> <font face="Arial">Duration</font> </td>
    <td> <font face="Arial">Start and End Dates</font> </td>
</tr>
<?php
if ($result = query($sql)) {
    while ($row = $result->fetch_assoc()) {

        echo '<tr> 
                  <td>' . $row["sid"] . '</td> 
                  <td>' . $row["fname"] . ' ' . $row["lname"] . '</td> 
                  <td>' . $row["room"] . '</td> 
                  <td>$' . $row["rent"] . '</td>
                  <td>' . $row["duration"] * 4 . ' months</td>
                  <td>' . $row["start_end_dates"] . '</td> 
              </tr>';
    }
    $result->free();
    echo '</table>';
} 

?>
