<?php
/**
 * Created by PhpStorm.
 * User: RatneshThakur
 * Date: 10/3/2015
 * Time: 11:04 PM
 */
require '../resources/config.php';

if(is_null($GLOBALS['conn']) == TRUE)
{
    $conn = getConnection();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo " will add picture for the contacts now";
    $contact_id = $_POST['contact_id'];

    $picture = addslashes(file_get_contents($_FILES['picture']['tmp_name']));

    $sql = "INSERT  INTO contact_data (contact_id,picture)
        VALUES ('$contact_id','$picture')";

    if($conn->query($sql) == TRUE)
    {
        $vhref = 'viewContact.php?id='.$contact_id;
        echo $vhref;
        $location = "Location: " + $vhref;
        header('Location: '.$vhref);
        exit;
        //echo " New record created successfully";
    }
    else
    {
        //echo "Error: ".$sql."<br>".$conn->error;
    }
}

mysqli_close($conn);
?>