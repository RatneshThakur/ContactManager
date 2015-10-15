<?php
/**
 * Created by PhpStorm.
 * User: RatneshThakur
 * Date: 10/3/2015
 * Time: 4:05 PM
 */
include_once('header.php');
require '../resources/config.php';

// define variables and set to empty values
$contact_nameErr = $emailErr = $phoneErr = $contact_photoErr =  "" ;
$contact_name = $email = $phone = $address = $contact_photo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["contact_name"];
    if($_FILES['contact_photo']['tmp_name'] == null)
        $photo = null;
    else
        $photo = addslashes(file_get_contents($_FILES['contact_photo']['tmp_name']));
    $list_id = $_POST["list_id"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];

}


//now adding data to the contacts table
$conn = $GLOBALS['conn'];
if(is_null($GLOBALS['conn']) == TRUE)
{
    $conn = getConnection();
}

//echo "Successfull connection ";

//$sql = "INSERT  INTO contact_table (contact_name,email) VALUES ('".$name."','".$email."')";
if(strlen($name) == 0)
    $sql = "INSERT  INTO contact_table (contact_name,contact_photo,phone,email,address,list_id)
        VALUES (null,'$photo','$phone','$email','$address','$list_id')";
else
    $sql = "INSERT  INTO contact_table (contact_name,contact_photo,phone,email,address,list_id)
        VALUES ('$name','$photo','$phone','$email','$address','$list_id')";

if($conn->query($sql) == TRUE)
{

    header('Location: index.php');
    exit;
    //echo " New record created successfully";
}
else
{
    echo "SQL Error: You cannot put the Contact name as null, as it is required field.";
}
$conn->close();
include_once("footer.php");

?>

