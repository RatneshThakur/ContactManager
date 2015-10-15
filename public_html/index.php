<?php
/**
 * Created by PhpStorm.
 * User: RatneshThakur
 * Date: 10/2/2015
 * Time: 10:23 PM
 */

$PageTitle="Home";

include('header.php');

require '../resources/config.php';

if(is_null($GLOBALS['conn']) == TRUE)
{
    $conn = getConnection();
}

$sql = "SELECT contact_id,contact_name,contact_photo,phone,email,address FROM contact_table ORDER BY contact_name";
$result = mysqli_query($conn,$sql);

if(!$result || (mysqli_num_rows($result) == 0))
{
    echo "<br>No result found in the table";

}
else{
    //outputing data

    echo "<h2> All your contacts </h2>";
    echo "<table class='table table-striped table borderless table-condensed' width='100'>";
    //echo "<tr><th>Name</th> <th> Image </th> <th> phone </th> <th> email </th>";
    //echo "<th> address </th> ";
    //echo "</tr>";
    while($row = $result->fetch_assoc())
    {

        echo "<tr><td>";
        $photo = $row['contact_photo'];
        if($photo == null)
            echo '<img height="42" width="42" src="defaultImage.png"/>';
        else
            echo '<img height="42" width="42" src="data:image/jpeg;base64,'.base64_encode( $row['contact_photo'] ).'"/>';
        echo "</td>";
        echo "<td>".$row["contact_name"]."</td>";
        //echo "<td>".$row["phone"]."</td>";
        //echo "<td>".$row["email"]."</td>";
        //echo "<td>".$row["address"]."</td>";
        $vhref = 'viewContact.php?id='.$row["contact_id"];
        echo "<td> <div style='float: right;'> <a href='$vhref' class='btn btn-primary'> View </a>";
        $uhref = 'updateContact.php?id='.$row["contact_id"];
        echo " <a href='$uhref' class='btn btn-primary'> Update </a> ";
        $dhref = 'deleteContact.php?id='.$row["contact_id"];
        echo " <a href='$dhref' class='btn btn-primary' onClick=\"return confirm('Deleting Contact will delete the contact pictures also. Do you want to continue?')\"> Delete </a> </div></td>";
        echo "</tr>";
        //onClick="return confirm('Delete This account?')"
        //echo "contact name : ". $row["contact_name"];
        //echo "<br>";
    }
    echo "</table>";
}

include_once("footer.php");
//echo "</div></body></html>";
mysqli_close($conn);

?>