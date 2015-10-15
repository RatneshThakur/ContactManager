<?php
/**
 * Created by PhpStorm.
 * User: RatneshThakur
 * Date: 10/3/2015
 * Time: 4:05 PM
 */
require '../resources/config.php';

// define variables and set to empty values
$contact_nameErr = $emailErr = $phoneErr = $contact_photoErr =  "" ;
$contact_name = $email = $phone = $address = $contact_photo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["contact_name"];
    if($_FILES['contact_photo']['size'] > 0)
        $photo = addslashes(file_get_contents($_FILES['contact_photo']['tmp_name']));
    else
        $photo = null;

    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $contact_id = $_POST["contact_id"];
    $list_id = $_POST["list_id"];

}


//now adding data to the contacts table
$conn = $GLOBALS['conn'];
if(is_null($GLOBALS['conn']) == TRUE)
{
    $conn = getConnection();
}

//echo "Successfull connection ";

//$sql = "INSERT  INTO contact_table (contact_name,email) VALUES ('".$name."','".$email."')";
if($photo == null)
    $sql = "UPDATE contact_table SET contact_name='$name',phone = '$phone', email= '$email', address='$address',list_id='$list_id'  WHERE contact_id=$contact_id";
else
    $sql = "UPDATE contact_table SET list_id = '$list_id',contact_name='$name',contact_photo='$photo', phone = '$phone', email= '$email', address='$address'  WHERE contact_id=$contact_id";

//$sql = "INSERT  INTO contact_table (contact_name,contact_photo,phone,email,address)
 //       VALUES ('$name','$photo','$phone','$email','$address')";

if($conn->query($sql) == TRUE)
{

    header('Location: index.php');
    exit;
    //echo " New record created successfully";
}
else
{
    echo "Error: ".$sql."<br>".$conn->error;
}
$conn->close();


?>

