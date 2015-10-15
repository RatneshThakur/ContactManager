<?php
/**
 * Created by PhpStorm.
 * User: RatneshThakur
 * Date: 10/9/2015
 * Time: 2:34 AM
 */
$PageTitle="Image";

include('header.php');
require '../resources/config.php';
if(is_null($GLOBALS['conn']) == TRUE)
{
    $conn = getConnection();
}

$dataid = $_GET["dataid"];
$contact_id = $_GET["contact_id"];

$sql = "DELETE FROM contact_data WHERE dataid=$dataid";

if ($conn->query($sql) === TRUE) {
    //echo "Record deleted successfully";
    echo "<script>window.opener.location.reload(false)</script>";
    echo "<script>window.close();</script>";
    //header('Location: http://localhost/personalContactManager/public_html/viewContact.php?id='.$contact_id);
    exit;
} else {
    echo "Error deleting record: " . $conn->error;
}


$conn->close();
include_once("footer.php");
?>