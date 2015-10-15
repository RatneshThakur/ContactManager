<?php
include_once('header.php');
?>



    <form role="form" action="addContact.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control"  placeholder="Name of Contact.." name="contact_name">
        </div>
        <div class="form-group">
            <label for="list_id">Contact Type</label>
            <select class="form-control"  name="list_id">
                <option label="Facebook Friend">1</option>
                <option label="Family Friend">2</option>
                <option label="Collegue">3</option>
                <option label="Other">4</option>
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputFile">Profile Photo</label>
            <input type="file" class ="form-control"  name="contact_photo">
            <p class="help-block">Upload a picture of your contact</p>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Phone</label>
            <input type="text" class="form-control"  placeholder="979 123 4567" name="phone">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" class="form-control"  placeholder="something@something.com" name="email">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Address</label>
            <input type="text" class="form-control"  placeholder="123 street.." name="address">
        </div>


        <button type="submit" class="btn btn-default">Submit</button>
    </form>


<!--
        <h2>Add new Contact</h2>
        <form role="form" action="addContact.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Name" name="contact_name">
                </div>
            </div>
            <div class="form-group">
                <label for="sel1">Select list:</label>
                <select class="form-control" id="sel1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                </select>
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
                    <input type="text" class="form-control" placeholder="123.." name="phone">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Email:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="something@something.com" name="email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Address:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="123 Street.." name="address">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </form>


-->
    <!--
<div class="container">
    <form action="addContact.php" method="post" enctype="multipart/form-data">
        Contact Name: <input type="text" name="contact_name"><br>
        Contact Photo: <input type="file" name="contact_photo"> <br>
        Phone: <input type="text" name="phone"> <br>
        E-mail: <input type="text" name="email"><br>
        address: <input type="text" name="address"> <br>
        <input type="submit">
    </form>
</div>
-->
<?php
include_once('footer.php');
?>