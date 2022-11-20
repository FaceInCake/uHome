<?php
    require_once 'vars/.env';



    // - - = = Important Variables = = - -
    $DEBUG = true; // Configure me!
    $ERR_MSG = ""; // Read me if an error occurs
    // -----------------------------------



    $ERR500 = "Error 500: Internal server error";

    // Returns either the row_id affected or the result set
    // Returns false on error
    // Check $ERR_MSG for the error message
    // This functions creates and closes an SQL connection, which can be inefficient if you are making multiple queries
    function query ($q, ...$args) {
        global $DEBUG; global $ERR_MSG; global $ERR500;
        if ($DEBUG) mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);
        global $DB_HOST; global $DB_USER; global $DB_PASS; global $DB_NAME;
        $con = new MySQLi($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        if ($con->connect_errno) {
            if ($DEBUG) {
                $ERR_MSG = "Connection failed: " . $con->connect_error;
            } else {
                $ERR_MSG = $ERR500;
            }
            $con->close();
            return false;
        }
        $stmt = $con->prepare($q);
        if ($stmt === false) {
            if ($DEBUG) {
                $ERR_MSG = $con->error;
            } else {
                $ERR_MSG = $ERR500;
            }
            $con->close();
            return false;
        }
        if (! $stmt->execute($args)) return $ERR500;
        $id = $con->insert_id;
        $res = $stmt->get_result();
        $stmt->close();
        $con->close();
        if ($res === false) {
            if ($id === 0) {
                return true;
            } else {
                return $id;
            }
        }
        return $res;
    }

?>
