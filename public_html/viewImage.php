<?php
/**
 * Created by PhpStorm.
 * User: RatneshThakur
 * Date: 10/9/2015
 * Time: 2:09 AM
 */
$PageTitle="Image";

include('header.php');
require '../resources/config.php';

if(is_null($GLOBALS['conn']) == TRUE)
{
    $conn = getConnection();
}
?>
<h2> Image </h2>
<hr>
<?php

$dataid = $_GET["dataid"];
$contact_id = $_GET["contact_id"];
$sql = "SELECT contact_id,dataid,picture FROM contact_data WHERE dataid = $dataid";
$result = mysqli_query($conn,$sql);

echo "<table>";
$countRow = 0;
while($row = $result->fetch_assoc())
{
    echo "<tr>";
    echo "<td>";

    echo '<img style="border:0; width=60%;" src="data:image/jpeg;base64,'.base64_encode( $row['picture'] ).'"/>';

    echo "</td>";
    echo "</tr>";

}
echo "</table>";

echo "<hr>"



?>


<h4>&nbsp;&nbsp;Delete this Image? </h4>
<table>

    <tr>
        <?php $dImagehref = 'deleteImage.php?dataid='.$dataid.'&contact_id='.$contact_id;?>
        <td> <a href=<?php echo $dImagehref ?> class='btn btn-primary' onClick="return confirm('Deleting the image.Do you want to continue?')"> Delete </a>  </td>
    </tr>
</table>

<?php
$conn->close();
include_once("footer.php");
?>
