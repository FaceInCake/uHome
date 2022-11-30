<?php
    session_start();
    require_once 'SQL.php';
    require_once 'Post.php';

    // Returns:
    // loggedin => bool : Is the user now officially logged in
    // status => int : Your usual http response status code
    // message => string : Short phrase describing the result
    function newInspection () {
        if (! isset($_SESSION["hid"])) return array(
            'status' => 403,
            'success' => false,
            'message' => 'Forbidden'
        );    
        $fid = sanitize('[0-9]+', 'fid', 6);
        if ($fid === false) return createError400("fid");
        $i_date = sanitize('[0-9]{4}-[0-9]{2}-[0-9]{2}', 'i_date', 10);
        if ($i_date === false) return createError400("i_date");
        $satisfactory = sanitize('true|false|0|1', 'satisfactory', 24);
        if ($satisfactory === false) return createError400("satisfactory");
        $ad_comment = sanitize('.*', 'ad_comment', 250);
        if ($ad_comment === false) return createError400("ad_comment");
        
        $res = query("insert into flatinspection values (?,?,?,?,?)",
            $fid, $i_date, $_SESSION["hid"], $satisfactory, $ad_comment
        );

        if ($res !== false) return array (
            'status' => 200,
            'success' => true,
            'message' => 'Successfully added inspection'
        );

        global $ERR_MSG;
        return array(
            'status' => 400,
            'success' => false,
            'message' => "Failed to add inspection ({$ERR_MSG})"
        );
    }

    echo json_encode(newInspection());

?>
