<?php //admin.php
session_start();
require_once 'header.php';
require_once 'functions.php';
echo "<div class='container-fluid'><h1>Log in</h1></div>";

$error = "";

if(isset($_POST['user'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    if($user== "" || $pass == ""){
        $error = "Not all fields were entered<br />";
        
    }
    else
    {
        $query = "SELECT user, pass FROM users WHERE user='$user' AND pass='$pass'";
        
     if(mysql_num_rows(queryMysql($query))== 0)
    {
        $error = "Invalid USERNAME/PASSWORD<br />"; 
          
    }
    else
    {
        $_SESSION['username'] = $user;
        $_SESSION['password'] = $pass;
        if(isset($_SESSION['username'])){

	echo "<div class='container-fluid'><h3>You are now logged in <a href='gio.php'>Click Here to continue</a></h3></div>";
	}
        
       
    }
    }
}

echo <<<_FORM
<div class='container-fluid'>
<form class='form-horizontal' role='form' method ='post' action='admin.php'>$error
<div class="form-group">
<label class='col-xs-2'>Username:</label>
<div class='col-xs-12'>
    <input type='text' class='form-control' name='user' />
</div>
</div>
<div class='form-group'>
<label class="col-xs-2">Password:</label>
<div class='col-xs-12'>
<input type='password' class='form-control' name='pass' />
</div>
</div>
<input type='submit' value='Log in' />
</form>
</div>
_FORM;

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>


  </body>


</html>