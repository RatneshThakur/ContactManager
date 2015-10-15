<?php

$servername = "localhost";
$username = "xxxx";
$password = "xxxx";
$database = "personalcontactmanagement";
$conn = null;

function getConnection(){

    if(is_null($GLOBALS['conn']) == TRUE)
    {
        // Create connection
        //echo "Creating new connection";
        $GLOBALS['conn'] = new mysqli($GLOBALS['servername'],$GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']);
        // Check connection
        if ($GLOBALS['conn']->connect_error) {
            die("Connection failed: " . $GLOBALS['conn']->connect_error);
        }

    }

    //echo "Connected successfully Yo <br>";
    return $GLOBALS['conn'];
}



?>