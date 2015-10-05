<?php //header.php
echo <<<_HEAD

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pumps</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/portBox.css" rel="stylesheet" />
    <link href="style.css" rel="stylesheet" />
    <link href="css/pump.css" rel="stylesheet" />
    
    <!--FONT IMPORTING-->
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
_HEAD;

include_once("analytics_tracking.php");

echo <<<_HEAD
  <div id='andelnav' class='container-fluid'>
    <div id="navigation">
        <div id="logoArea" class="pull-left">
            <a href="#"><img src="img/PumpLogo_slanted.png"></a>
        </div>
        <div id="mainMenu" class="pull-right">
            <ul>
                <li><a href="pumps.php">HOME</a></li>
                
                <li><a href="add_event.php">ADD EVENT</a></li>
                <li><a href="search.php">Search</a></li>
            </ul>
        </div>
        </div>
    </div>
_HEAD;
?>