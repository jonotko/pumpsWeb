<?php //add_event.php
require_once 'header.php';

if(isset($_GET['new'])){

    switch($_GET['new']){
        case 'photo': 
        $error = 'You have not submitted a photo'; 
        break;
        case 'field':
        $error = 'Ensure all fields are entered and try submitting again. ';
        break;
        default:
        $error ="Nothing"; 
        break;
    }
    echo "<div class='container-fluid'>
    <div class='alert alert-danger' role='alert'>
    <h4><strong>Oh Snap!</strong></h4>".$error."</h5>
    
    </div>
    </div>";
}
?>

<div class='container-fluid'>
<form class='form-horizontal' role='form' method="post" action="new_event.php" enctype='multipart/form-data'>
    
<div class='form-group'>
    <label class='col-sm-2'>Event Name</label>
    <div class='col-sm-12'>
        <input type='text' class='form-control' name='eventname' maxlength="50" placeholder='What is your event called'/>
    </div>
</div>
<div class='form-group'>
    <label class='col-sm-2'>Location</label>
    <div class='col-sm-12'>
        <input type='text' class='form-control' name='location' maxlength="200" placeholder='Where is your event'/>
    </div>
</div>

<div class='form-group'>
    <label class='col-xs-2'>Dress Code</label>
    <div class="col-xs-12">
        <input type='text' class="form-control" name="dresscode" maxlength="100" placeholder="eg. Elegantly Casual" />
    </div>
</div>
    
<div class='form-group'>
    <label class="col-xs-2">Male price</label>
    <div class="col-xs-12">
        <input type='text' class="form-control" name="mprice" placeholder="eg $150 before 12" />
    </div>
</div>

<div class='form-group'>
    <label class="col-xs-2">Female price</label>
    <div class="col-xs-12">
        <input type='text' class="form-control" name="fprice" placeholder="eg Free before 12" />
    </div>
</div>

<div class='form-group'>
    <label class='col-xs-2'>Specials</label>
    <div class="col-xs-12">
        <input type='text' class="form-control" name="specials" maxlength="200" placeholder="Drink Specials" />
    </div>
</div>
<input type='hidden' name='legit' value='verify' />
    
<div class='form-group'>
    <label class='col-xs-2'>Date</label>
    <div class="col-xs-12">
        <input type='date' class="form-control" name="date" placeholder="Enter date" />
    </div>
</div>

<div class='form-group'>
    <label class='col-xs-2'>Time</label>
    <div class="col-xs-12">
        <input type='time' class="form-control" name="time" placeholder="hh:mm PM" />
    </div>
</div>

<div class='form-group'>
    <label class='col-xs-2'>Image</label>
    <div class="col-xs-12">
        <input type='file' class="form-control" name="image" />
    </div>
</div>
<div class='form-group'>
    <label class='col-xs-2'>Image name</label>
    <div class="col-xs-12">
        <input type='text' class="form-control" name="imgname" maxlength="10" placeholder="Any name will do, No spaces" />
    </div>
</div>
<input type="submit" value="Add Event" />
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>


  </body>


</html>
