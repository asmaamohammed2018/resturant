<?php
//if user doesn't login
if (!isset($_SESSION['user']))
{
//if don't login 
$_SESSION['no-login-message'] = "<div class='error text-center'>Please Login to access Admin Panel </div>";
//go to login page
header('location:' .SITEURL. 'admin/login.php');
}

?>