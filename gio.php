<?php //gio.php
session_start();
require_once 'header.php';
require_once 'login.php';
$user ="";
$message ="";
echo <<<_CSS
<style>
h1{
color:#0000FF;
}
</style>
_CSS;
if(isset($_SESSION['username']))
{
    switch($_SESSION['username']){
        case 'giocq': $user = 'Gio'; break;
        case 'jonotko': $user = 'John'; break;
        case 'andelh': $user = 'Andy'; break;
        default: $user = $_SESSION['username']; break;
    }
if(isset($_POST['delete']) && isset($_POST['imgname'])){
    $name = $_POST['imgname'];
    $query = "DELETE FROM events WHERE ImgName='$name'";
    $result = mysql_query($query);
    if(!$result){
        echo "<div class='container-fluid'><h3>Delete Failed</h3></div><br />".mysql_error();;
    }
    unlink('img/'.$name.'.jpg');
}
if(isset($_POST["query"])){
    $query = $_POST["query"];
    $result = mysql_query($query);
    if(!$result) {
        $message = "Query Unsuccessful";
    }
    else{
    $message = "Update Successful";
    }
}
echo "<div class='container-fluid'><h1>Welcome $user</h1>";
echo <<<_HTML
<div class="list-group col-md-3 col-xs-12">
  <a href="gio.php" class="list-group-item active">
    Database
  </a>
  <a href="messages.php?settings=messages&active=activem" class="list-group-item">Messages</a>
  <a href="messages.php?settings=changeu&active=activeu" class="list-group-item">Change Username</a>
  <a href="messages.php?settings=changep&active=activep" class="list-group-item">Change Password</a>
  <a href="logout.php" class="list-group-item">Logout</a>
</div>

<div class='col-md-9 col-xs-12' id='queryform'>
<h1>Run query $message</h1>
<form class='form-horizontal' role='form' method='post' action='gio.php'>
<div class='form-group'>
<div class='col-md-12 col-xs-12'>
<textarea id='query_text' name='query' placeholder="UPDATE events SET Column='value' WHERE Column='value'" ></textarea>
</div>

<div class='col-md-6 col-xs-6'>
<input type='submit' value='UPDATE' />
</div>
</div>
</form>
</div>
</div>
_HTML;


$query = "SELECT * FROM events ORDER BY Date";
$result = mysql_query($query);
if(!$result) die ("Something Went wrong ".mysql_error());
echo "<div class='container-fluid'>";

$rows = mysql_num_rows($result);



for($i =0; $i<$rows; $i++){
$row = mysql_fetch_row($result);
echo "<table class='table table-bordered'>";
echo <<<_TABLE
<tr>
<th>Event Name</th>
<th>Dress Code</th>
<th>Male Price</th>
<th>Female Price</th>
<th>Specials</th>
<th>Date</th>
<th>Time</th>
<th>ImgName</th>
<th>Location</th>
<th>Verified</th>
</tr>
<tr>
<td>$row[0]</td>
<td>$row[1]</td>
<td>$row[2]</td>
<td>$row[3]</td>
<td>$row[4]</td>
<td>$row[5]</td>
<td>$row[6]</td>
<td>$row[7]</td>
<td>$row[8]</td>
<td>$row[9]</td>
</tr>

</table>

<form class='form-horizontal' role='form' method='post' action='gio.php'>
<div class='form-group'>
<div class='col-xs-10'>
<input type='hidden' name='delete' value='yes' />
<input type='hidden' name='imgname' value='$row[7]' />
<input type='submit' value='DELETE'/>
</div>
</div>
</form>

_TABLE;
}
echo "</div>";
}
else{
    die("<div class='container-fluid' id='hacker'>HOW DID YOU GET HERE?<br /><a href='admin.php'>Click Here to Log in</a><br/>If you have Permission</div>");
}



?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>


  </body>


</html>
