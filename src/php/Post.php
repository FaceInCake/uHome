<?php

    const error400_badinput = array(
        'status' => 400,
        'message' => 'Invalid parameters',
        'success' => false,
    );

    function createError400 ($field) {
        return array(
            'status' => 400,
            'success' => false,
            'message' => 'Invalid ' . $field
        );    
    }

    // Function for stricly sanitizing a POST[key] from a regex pattern
    // $pattern is a regex pattern, post-formatted for you as "/\A$pattern\Z/"
    // $key is for indexing $_POST
    // $len is the max length for the input
    function sanitize ($pattern, $key, $len) {
        if (preg_match("/\\A$pattern\\Z/", $_POST[$key], $matches)) {
            if (strncmp($_POST[$key], $matches[0], $len)==0) {
                return $matches[0];
            }
        }
        return false;
    }

    // Same as `sanitize()` but with $_GET
    function sanitizeGet ($pattern, $key, $len) {
        if (preg_match("/\\A$pattern\\Z/", $_GET[$key], $matches)) {
            if (strncmp($_GET[$key], $matches[0], $len)==0) {
                return $matches[0];
            }
        }
        return false;
    }

?>
