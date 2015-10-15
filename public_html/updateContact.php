<?php
/**
 * Created by PhpStorm.
 * User: RatneshThakur
 * Date: 10/3/2015
 * Time: 7:01 PM
 */
$PageTitle="Contact Information";

include('header.php');
require '../resources/config.php';


if(is_null($GLOBALS['conn']) == TRUE)
{
    $conn = getConnection();
}
$contact_id = $_GET["id"];

$sql = "SELECT contact_id,contact_name,contact_photo,phone,email,address,list_id FROM contact_table WHERE contact_id = $contact_id";
$result = mysqli_query($conn,$sql);


if(!$result || (mysqli_num_rows($result) == 0))
{
    //echo "<br>No result found in the table";

}
else{
    //echo '<div> HEllo world </div>';
    //outputing data
    //echo "<table>";

    while($row = $result->fetch_assoc())
    {
        //echo "<tr><td>";
        $profilepic = $row['contact_photo'];
        echo '<div class="container">';
        //$rowCopy = $row;
        //echo '<img class="imgClass" src="data:image/jpeg;base64,'.base64_encode( $row['contact_photo'] ).'"/>';
        //echo "</td></tr>";
        //echo "<tr><td>Name: </td><td>".$row["contact_name"]."</td></tr>";

        //echo "<tr><td>Phone: </td><td>".$row["phone"]."</td></tr>";
        //echo "<tr><td>Email: </td><td>".$row["email"]."</td></tr>";
        //echo "<tr><td>Address: </td><td>".$row["address"]."</td></tr>";
        //echo "contact name : ". $row["contact_name"];
        //echo "<br>";

        echo '<form role="form" action="updateContactHelper.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control"   name="contact_name" value="'.$row["contact_name"].'">
        </div>
        <div class="form-group">
            <label for="list_id">Contact Type</label>
            <select class="form-control"  name="list_id" value="'.$row["list_id"].'">';

        if($row["list_id"] == 1)
            echo' <option label="Facebook Friend" selected="selected">1</option>';
        else
            echo ' <option label="Facebook Friend">1</option>';
        if($row["list_id"] == 2)
            echo '<option label="Family Friend" selected="selected">2</option>>';
        else
            echo   '<option label="Family Friend">2</option>';
        if($row["list_id"] == 3)
            echo '<option label="Collegue" selected="selected">3</option>';
        else
            echo '<option label="Collegue">3</option>';
        if($row["list_id"] == 4)
            echo '<option label="Other" selected ="selected">4</option>';
        else
            echo '<option label="Other">4</option>';
       echo '     </select>
        </div>

        <div class="form-group">
            <label for="exampleInputFile">Profile Photo</label>
            <input type="file" class ="form-control"  name="contact_photo">
            <p class="help-block">Upload a picture of your contact</p>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input type="text" class="form-control"   name="phone" value="'.$row["phone"].'">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" class="form-control"   name="email" value="'.$row["email"].'">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Address</label>
            <input type="text" class="form-control"  placeholder="123 street.." name="address" value="'.$row["address"].'">
        </div>
        <div class="form-group">

             <input type="hidden" class="form-control" name="contact_id" value="'.$contact_id.'">

        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>';

        echo '</div>';

        //


      /*  echo '<div class="container">
        <h2>Update Contact Details </h2>
        <form class="form-horizontal" role="form" action="updateContactHelper.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Name" name="contact_name" value="'.$row["contact_name"].'">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Photo:</label>
                <div class="col-sm-10">
                    <input type="file" name="contact_photo" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Phone:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="123.." name="phone" value="'.$row["phone"].'">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Email:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="something@something.com" name="email" value="'.$row["email"].'">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Address:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="123 Street.." name="address" value="'.$row["address"].'">
                </div>
            </div>
            <div class="col-sm-10">
                    <input type="hidden" class="form-control" name="contact_id" value="'.$contact_id.'">
                </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </form>
    </div>';
    */

    }
    //echo "</table>";




}

?>



<?php


include_once("footer.php");
$conn->close();
?>