<?php
    session_start();
    require_once "../php/SQL.php";
    require_once "../php/Post.php";

    if (! isset($_SESSION['hid'])) {
        require_once "../pages/Error403.php";
        exit(403);
    }
?>

<div>
    <form action = "" method = "post">
        <label>Flat Number: </label>
        <input type = "number" name = "fid" required />
        <br><br>
        <label>Inspection Date: </label>
        <input type = "Date" name = "i_date" required />
        <br><br>
        <label>Satisfactory: </label>
        <input type = "text" name = "satisfactory" placeholder = "1 or 0" required />
        <br><br>
        <label>Comments: </label>
        <input type = "text" name = "ad_comment" />
        <br><br>
        <button id="fsub" class="btn btn-primary">Submit</button>
    </form>
    <em id="resptext"></em>
</div>
<script>
    $("#fsub").click(function (e) {
        e.preventDefault();
        var data = {};
        $("form input").each(function(i, elem) {
            data[elem.name] = elem.value;
        });
        $.post("php/NewInspection.php", data, function(res) {
            res = JSON.parse(res);
            $("#resptext").html(res.message);
            if (res.success) $("form").trigger("reset");
        });
    });
</script>
