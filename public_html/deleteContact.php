<?php
/**
 * Created by PhpStorm.
 * User: RatneshThakur
 * Date: 10/3/2015
 * Time: 6:57 PM
 */
require '../resources/config.php';
if(is_null($GLOBALS['conn']) == TRUE)
{
    $conn = getConnection();
}

//echo "Will delete contact now";

// sql to delete a record
$contact_id = $_GET["id"];
$sql = "DELETE FROM contact_table WHERE contact_id=$contact_id";

if ($conn->query($sql) === TRUE) {
    //echo "Record deleted successfully";
    header('Location: index.php');
    exit;
} else {
    echo "Error deleting record: " . $conn->error;
}


?>