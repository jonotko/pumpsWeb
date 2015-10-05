<?php //login.php
/*
$dbhost = 'localhost';
$dbname = 'pumps';
$dbuser = 'jonotko';
$dbpass = 'XDS729vFz6wZ9j6b';
*/
$dbhost = 'localhost';
$dbname = 'test';
$dbuser = 'jonotko';
$dbpass = 'XDS729vFz6wZ9j6b'; // password for online IuJJ7sf0Ac4V 

 mysql_connect($dbhost, $dbuser, $dbpass) or                 die("Unable to connect to database".mysql_error());

mysql_select_db($dbname) or die("Unable to select           database".mysql_error());
/*
$query = "CREATE TABLE users(
user VARCHAR(20),
pass VARCHAR(20))";
$result = mysql_query($query);

if(!$result) die("Couldn't peform query".mysql_error());
*/
?>