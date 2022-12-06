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
    function attemptLogin () {
        if (isset($_SESSION['sid'])) return array(
            'status' => 400,
            'success' => true,
            'message' => 'You are already logged in'
        );        
        $sid = sanitize('[0-9]{9}', 'sid', 9);
        if ($sid === false) return error400_badinput;
        $password = sanitize('.{8,32}', 'pass', 32);
        if ($password === false) return error400_badinput;
        $res = query("SELECT sid FROM student WHERE sid=?;", $sid);
        if ($res->num_rows != 1) return error400_incorrect;
        $row = $res->fetch_assoc();
        // $hash = $row['password'];
        // if (! password_verify($password, $hash)) return error400_incorrect;
        // We're good!
        $_SESSION['sid'] = $row['sid'];
        return array(
            'status' => 200,
            'success' => true,
            'message' => 'Successfully logged in',
            'sid' => $row['sid']
        );
    }

?>
