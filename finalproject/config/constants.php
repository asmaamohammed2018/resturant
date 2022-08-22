<?php 
session_start();

define('SITEURL','http://localhost/finalproject/');

define('LOCALHOSt','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food-order');





//send data to database
$conn = mysqli_connect(LOCALHOSt,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
$db_select=mysqli_select_db($conn,DB_NAME) or die(mysqli_error());










?> 
