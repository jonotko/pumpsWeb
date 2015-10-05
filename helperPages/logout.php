<?php //logout.php
session_start();
require_once 'functions.php';
if(isset($_SESSION['username'])){
    destroySession();
    header('Location:admin.php');
}
?>