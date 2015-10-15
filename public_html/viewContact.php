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

//$sql = "SELECT contact_id,contact_name,contact_photo,phone,email,address FROM contact_table WHERE contact_id = $contact_id";
$sql = "SELECT contact_table.contact_name, contact_table.contact_photo, contact_table.phone, contact_table.email, contact_table.address, list_info.name as contact_type
        FROM contact_table, list_info
        WHERE contact_table.contact_id = $contact_id AND contact_table.list_id = list_info.list_id";
$result = mysqli_query($conn,$sql);


if(!$result || (mysqli_num_rows($result) == 0))
{
    //echo "<br>No result found in the table";

}
else{
    //echo '<div> HEllo world </div>';
    //outputing data




    while($row = $result->fetch_assoc())
    {
        echo "<h2> Contact information</h2>";
        echo "<hr>";
        echo "<table id='profilepic' style='margin-top: -40px;'>";
        echo "<tr><td>";
        echo "<table>";
        //echo "<tr><td>";
        //$profilepic = $row['contact_photo'];
        $contactName = $row["contact_name"];
        echo '<h1>';
        //echo '<img class="imgClass" src="data:image/jpeg;base64,'.base64_encode( $row['contact_photo'] ).'"/>';
        echo "</td></tr>";
        echo "<tr><td><b>Name: </b></td><td>".$row["contact_name"]."</td></tr>";
        echo "<tr><td><b> Contact Type:</b> </td><td>".$row["contact_type"]."</td></tr>";
        echo "<tr><td><b>Phone:</b> </td><td>".$row["phone"]."</td></tr>";
        echo "<tr><td><b>Email: </b></td><td>".$row["email"]."</td></tr>";
        echo "<tr><td><b>Address:</b> </td><td>".$row["address"]."</td></tr>";

        echo '</h1>';
        echo "</table>";
        echo "</td><td>";
        if($row['contact_photo'] == null)
            echo '<img height="142" width="142" src="defaultImage.png"/>';
        else
            echo '<img class="imgClass" src="data:image/jpeg;base64,'.base64_encode( $row['contact_photo'] ).'"/>';
        echo "</td></tr>";
        echo "</table>";
        //echo "contact name : ". $row["contact_name"];
        //echo "<br>";
    }
    //echo "</table>";
    //echo "</div></div>";
    //echo '<img src="data:image/jpeg;base64,'.base64_encode( $profilepic ).'"/>';




}

?>

    <div class="picuploader">

        <h4>&nbsp;&nbsp;Update or Delete contact </h4>
        <table>
            <?php $uhref = 'updateContact.php?id='.$contact_id; ?>
            <tr> <td> <a href= <?php echo $uhref ?> class='btn btn-primary'> Update </a> </td>
            <?php $dhref = 'deleteContact.php?id='.$contact_id;?>
            <td> <a href=<?php echo $dhref ?> class='btn btn-primary' onClick="return confirm('Deleting Contact will delete the contact pictures also. Do you want to continue?')"> Delete </a>  </td>
            </tr>
        </table>

        <hr>
        <h2> Add Some pics </h2>



        <form role="form" action="addPicture.php" method="post" enctype="multipart/form-data">

            <div class="form-group" style="width:50%;">
                <label for="exampleInputFile">Picture</label>
                <input type="file" class ="form-control"  name="picture">
            </div>
            <div class="form-group">
                <input type="hidden" class ="form-control"  name="contact_id" value=<?php echo $contact_id ?> >
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
            <!--
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Picture:</label>
                <div class="col-sm-10">
                    <input type="file" name="picture" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10">
                    <input type="hidden" class="form-control" placeholder="123.." name="contact_id" value=<?php echo $contact_id ?> >
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
            -->
        </form>


   <!-- <form action='addPicture.php' method="post" enctype="multipart/form-data">
        Pic: <input type="file" name="picture"> <br>
             <input type="hidden" name="contact_id" value=<?php echo $contact_id ?> >
             <br>
        <input type="submit">
    </form> -->
    </div>
    <hr>





<?php
//now printing all the data from the pics table
echo "<h2> All pics of $contactName </h2>";

$sql = "SELECT contact_id,dataid,picture FROM contact_data WHERE contact_id = $contact_id";
$result = mysqli_query($conn,$sql);


if(!$result || (mysqli_num_rows($result) == 0))
{
    echo "<br>There are no pictures for this contact.";

}
else{
    //outputing data
    echo "<table>";
    $countRow = 0;
    while($row = $result->fetch_assoc())
    {
        $countRow = $countRow + 1;
        if($countRow === 1)
        {
            echo "<tr>";
        }
        echo "<td>";
        $imageid = $row['dataid'];
        $imagehref = "viewImage.php?dataid=".$imageid."&contact_id=".$contact_id;
        echo '<a href='.$imagehref.' target="_blank">';

        echo '<img class="imgClass" style="border:0;" src="data:image/jpeg;base64,'.base64_encode( $row['picture'] ).'"/>';

        echo '</a>';
        echo "</td>";
        if($countRow === 7)
        {
            echo "</tr>";
        }
    }
    echo "</table>";
}

include_once("footer.php");
$conn->close();
?>