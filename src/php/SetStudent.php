<?php

    if (! isset($_SESSION["hid"]))
        header("location: Error403");

    require_once 'php/SQL.php';
    require_once 'php/Post.php';

    const error400_incorrect = array(
        'status' => 400,
        'success' => false,
        'message' => 'Incorrect username or password'
    );

    // Returns:
    // loggedin => bool : Is the user now officially logged in
    // status => int : Your usual http response status code
    // message => string : Short phrase describing the result
    function setStudent () {
        $sid = sanitize('[0-9]{9}', 'sid', 9);
        if ($sid === false) return error400_badinput;
        $advisor_id = sanitize('[0-9]+', 'advisor_id', 64);
        if ($advisor_id === false) return error400_badinput;
        $fname = sanitize('\w{3,24}', 'fname', 24);
        if ($fname === false) return error400_badinput;
        $lname = sanitize('\w{3,32}', 'lname', 32);
        if ($lname === false) return error400_badinput;
        $address = sanitize('\w{3,100}', 'address', 100);
        if ($address === false) return error400_badinput;
        $birthday = sanitize('[0-9]{4}-[0-9]{2}-[0-9]{2}', 'birthday', 10);
        if ($birthday === false) return error400_badinput;
        $category_id = sanitize('[0-9]+', 'category_id', 8);
        if ($category_id === false) return error400_badinput;
        $is_placed = sanitize('true|false|0|1', 'is_placed', 4);
        if ($is_placed === false) return error400_badinput;
        $gender = sanitize('Male|Female|Other', 'gender', 6);
        if ($gender === false) return error400_badinput;
        $nationality_id = sanitize('[0-9]+', 'nationality_id', 6);
        if ($nationality_id === false) return error400_badinput;
        $degree_id = sanitize('[0-9]+', 'degree_id', 6);
        if ($degree_id === false) return error400_badinput;
        $needs = sanitize('.+', 'needs', 250);
        if ($needs === false) return error400_badinput;
        $ad_comment = sanitize('.+', 'ad_comment', 250);
        if ($ad_comment === false) return error400_badinput;
        
        $res = query("insert into student values (?,?,?,?,?,?,?,?,?,?,?,?,?)",
            $sid, $advisor_id, $fname, $lname, $address, $birthday,
            $category_id, $is_placed, $gender, $nationality_id,
            $degree_id, $degree_id, $needs, $ad_comment
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

?>
