<?php
    require_once 'SQL.php';
    require_once 'Post.php';

    const error400_incorrect = array(
        'status' => 400,
        'success' => false,
        'message' => 'Incorrect username or password'
    );

    // Returns:
    // loggedin => bool : Is the user now officially logged in
    // status => int : Your usual http response status code
    // message => string : Short phrase describing the result
    function staffAttemptLogin () {
        if (isset($_SESSION['hid'])) return array(
            'status' => 400,
            'success' => true,
            'message' => 'You are already logged in'
        );        
        $hid = sanitize('[0-9]+', 'hid', 64);
        if ($hid === false) return error400_badinput;
        $password = sanitize('.{8,32}', 'pass', 32);
        if ($password === false) return error400_badinput;
        $res = query("SELECT hid FROM staff WHERE hid=?;", $hid);
        if ($res->num_rows != 1) return error400_incorrect;
        $row = $res->fetch_assoc();
        // $hash = $row['password'];
        // if (! password_verify($password, $hash)) return error400_incorrect;
        // We're good!
        $_SESSION['hid'] = $row['hid'];
        return array(
            'status' => 200,
            'success' => true,
            'message' => 'Successfully logged in',
            'hid' => $row['hid']
        );
    }

?>
