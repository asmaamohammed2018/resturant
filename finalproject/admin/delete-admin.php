<?php
//Constants file
include('../config/constants.php');

//Get id of deleted admin 
$id=$_GET['id'];
//Delete the id from database
$sql="DELETE FROM tbl_admin WHERE id=$id";
$res=mysqli_query($conn,$sql);

if($res==true)
  {
    //Deleted Successfully
$_SESSION['delete']= "<div class='success'> Admin Deleted Successfully </div>"; 
//Returned to page
header('location:'.SITEURL. 'admin/manage-admin.php');
  }
else
{
    $_SESSION['delete']="<div class='error'> Failed to Delete Admin, Try Again! </div>"; 
    //Returned to page
    header('location:'.SITEURL. 'admin/manage-admin.php');


}
?>