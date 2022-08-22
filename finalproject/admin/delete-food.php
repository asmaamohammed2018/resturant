<?php

//Constants file
include('../config/constants.php');
if(isset($_GET['id']) && isset($_GET['image_name']))
{
    //Get id of deleted food
$id=$_GET['id'];
$image_name=$_GET['image_name'];
if($image_name !="")
{
    //first for remove image
    $path="../images/food/" .$image_name;
    $remove=unlink($path);
    if($remove==false)
    {
        $_SESSION['upload']= "<div class='error'> Failed to Delete image, Try Again! </div>"; 
//Returned to page
header('location:'.SITEURL. 'admin/manage-food.php');
die();  
    }
}

$sql="DELETE FROM tbl_food WHERE id=$id";
$res=mysqli_query($conn,$sql);
if($res==true)
{
    //second for delete data
    $_SESSION['delete']= "<div class='success'> Deleted Successfully </div>"; 
    //Returned to page
    header('location:'.SITEURL. 'admin/manage-food.php');
    
}


else{
    $_SESSION['delete']= "<div class='error'> Failed to Delete Food, Try Again! </div>"; 
    //Returned to page
    header('location:'.SITEURL. 'admin/manage-food.php');  
}



}
else{
    $_SESSION['Unauthorized']= "<div class='error'> Unauthorized Access! </div>"; 
    //Returned to page
    header('location:'.SITEURL. 'admin/manage-food.php');  
}  


?>
