<?php
    session_start();
    require_once 'SQL.php';
    require_once 'Post.php';

    function getError400 ($field) {
        return array(
            'status' => 400,
            'success' => false,
            'message' => 'Incorrect ' . $field
        );    
    }

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
        $sid = sanitize('[0-9]{9}', 'sid', 9);
        if ($sid === false) return getError400("sid");
        $advisor_id = sanitize('[0-9]+', 'advisor_id', 64);
        if ($advisor_id === false) return getError400("advisor");
        $fname = sanitize('\w{3,24}', 'fname', 24);
        if ($fname === false) return getError400("fname");
        $lname = sanitize('\w{3,32}', 'lname', 32);
        if ($lname === false) return getError400("lname");
        $address = sanitize('.{3,100}', 'address', 100);
        if ($address === false) return getError400("address");
        $birthday = sanitize('[0-9]{4}-[0-9]{2}-[0-9]{2}', 'birthday', 10);
        if ($birthday === false) return getError400("birthday");
        $category_id = sanitize('[0-9]+', 'category_id', 8);
        if ($category_id === false) return getError400("category");
        $is_placed = sanitize('true|false|0|1', 'is_placed', 4);
        if ($is_placed === false) return getError400("placed");
        $gender = sanitize('Male|Female|Other', 'gender', 6);
        if ($gender === false) return getError400("gender");
        $nationality_id = sanitize('[0-9]+', 'nationality_id', 6);
        if ($nationality_id === false) return getError400("nationality");
        $degree_id = sanitize('[0-9]+', 'degree_id', 6);
        if ($degree_id === false) return getError400("degree");
        $needs = sanitize('.*', 'needs', 250);
        if ($needs === false) return getError400("needs");
        $ad_comment = sanitize('.*', 'ad_comment', 250);
        if ($ad_comment === false) return getError400("ad_comment");
        
        $res = query("insert into student values (?,?,?,?,?,?,?,?,?,?,?,?,?)",
            $sid, $advisor_id, $fname, $lname, $address, $birthday,
            $category_id, $is_placed, $gender, $nationality_id,
            $degree_id, $needs, $ad_comment
        );

        if ($res !== false) return array (
            'status' => 200,
            'success' => true,
            'message' => 'Successfully added student'
        );

        return array(
            'status' => 400,
            'success' => false,
            'message' => 'Failed to add student'
        );
    }

    echo json_encode(newInspection());

?>
