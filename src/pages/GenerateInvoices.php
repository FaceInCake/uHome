<?php
    if(! isset($_SESSION["hid"]))
        header("location: Error403");

    require_once "php/SQL.php";
    $res = query("call generate_invoices(curdate());");

    echo "Rows Inserted: $res";
?>