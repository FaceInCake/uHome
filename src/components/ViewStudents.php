<?php 
    session_start();
    require_once "../php/SQL.php";
    require_once "../php/Post.php";

    if (! isset($_SESSION["hid"])) {
        require_once "../pages/Error403.php";
        exit(403);
    }


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
    
    $res = query($sql);

?>

<table class="table"> 
    <tr>
        <th>ID</th> 
        <th>Name</th> 
        <th>Room</th> 
        <th>Monthly Rent</th>
        <th>Duration</th>
        <th>Start and End Dates</th>
    </tr>
<?php while ($row = $res->fetch_assoc()) { ?>
    <tr>
        <td><?=$row["sid"]?></td>
        <td><?=$row["fname"].' '.$row["lname"]?></td>
        <td><?=$row["room"]?></td>
        <td><?=$row["rent"]?></td>
        <td><?=$row["duration"]*4?> months</td>
        <td><?=$row["start_end_dates"]?></td>
    </tr>
<?php } ?>
</table>
