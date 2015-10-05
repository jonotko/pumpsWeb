<?php
session_start();
require_once 'header.php';
$activemessage = $activeu = $activep ="";
$active = $_GET['active'];
switch($active){
    case 'activem':
    $activemessage = 'active';
    break;
    case 'activeu':
    $activeu = 'active';
    break;
    case 'activep':
    $activep = 'active';
    break;
}
echo <<<_HTML
<div class='container-fluid'>
<div class="list-group col-md-3 col-xs-12">
  <a href="gio.php" class="list-group-item">
    Database
  </a>
  <a href="messages.php?settings=messages&active=activem" class="list-group-item $activemessage">Messages</a>
  <a href="messages.php?settings=changeu&active=activeu" class="list-group-item $activeu">Change Username</a>
  <a href="messages.php?settings=changep&active=activep" class="list-group-item $activep">Change Password</a>
  <a href="logout.php" class="list-group-item">Logout</a>
</div>
</div>
</div>
_HTML;

if($_SESSION['username'] && $_SESSION['password']){
    require_once 'login.php';
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    if(isset($_POST['newpass'])){
        $newpass = $_POST['newpass'];
        $query = "UPDATE users SET pass='$newpass' WHERE user='$username'";
        $result = mysql_query($query);
        if(!$result){
            echo "<h1>Hard Luck yuh password eh change</h1>";
        }
        else{
            echo "Password changed successfully";
        }
        
        
    }elseif(isset($_POST['newuname'])){
        $newuname = $_POST['newuname'];
        $query = "UPDATE users SET user='$newuname' WHERE pass='$password'";
        $result = mysql_query($query);
        if(!$result){
            echo "<h1>Hard Luck yuh username eh change</h1>";
        }
        else{
            echo "Username changed successfully";
        }
    }
    else{
    switch($_GET['settings']){
    case 'changep':
        echo <<<_HTML
        <div class="container-fluid">
        <form role="form" method="post" action="messages.php">
  <div class="form-group col-md-4">
    <label>New Password</label>
    <input type="text" class="form-control" name="newpass" placeholder="Enter New Password">
  <input type="submit" value="Change" />
  </div>
  </form>
  </div>
_HTML;
        
        break;
    case 'changeu':
        echo <<<_HTML
        <div class="container-fluid">
        <form role="form" method="post" action="messages.php">
  <div class="form-group col-md-4">
    <label>New Username</label>
    <input type="text" class="form-control" name="newuname" placeholder="Enter New Username">
  <input type="submit" value="Change" />
  </div>
  </form>
  </div>
_HTML;
        break;
    case 'messages':
        echo "<h1>Hi messages</h1>";
        break;
    default:
    echo "<h1>You do not have access to this page".
        "<strong><a href='admin.php'> Please Leave</a>".
        "</strong>"."</h1>";
        break;
        
    
    }
    }
}
else{
    die("You do not have permission to view this page");

}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>


  </body>


</html>
