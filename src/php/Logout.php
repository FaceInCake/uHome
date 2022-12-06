<?php
    session_start();

    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(), '', 0, '/');
    // session_regenerate_id(true);

    http_response_code(200);

    header("location: /");
?>
