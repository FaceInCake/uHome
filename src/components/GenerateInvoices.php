<?php
    session_start();
    require_once "../php/SQL.php";
    require_once "../php/Post.php";

    if(! isset($_SESSION["hid"])) {
        require_once "../pages/Error403.php";
        exit(403);
    }

    $res = query("call generate_invoices(curdate());");

    echo "Rows Inserted: $res";
?>