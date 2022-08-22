<?php

//Constants file
include('../config/constants.php');
if(isset($_GET['id']) AND isset($_GET['image_name']))
{
    //Get id of deleted category
$id=$_GET['id'];
$image_name=$_GET['image_name'];
if($image_name !="")
{
    //first for remove image
    $path="../images/category/" .$image_name;
    $remove=unlink($path);
    if($remove==false)
    {
        $_SESSION['remove']= "<div class='error'> Failed to Delete Category image, Try Again! </div>"; 
//Returned to page
header('location:'.SITEURL. 'admin/manage-category.php');
die();  
    }
}

$sql="DELETE FROM tbl_category WHERE id=$id";
$res=mysqli_query($conn,$sql);
if($res==true)
{
    //second for delete data
    $_SESSION['delete']= "<div class='success'> Deleted Successfully </div>"; 
    //Returned to page
    header('location:'.SITEURL. 'admin/manage-category.php');
    
}


else{
    $_SESSION['delete']= "<div class='error'> Failed to Delete Category, Try Again! </div>"; 
    //Returned to page
    header('location:'.SITEURL. 'admin/manage-category.php');  
}
}

else 
{
    header('location:'.SITEURL. 'admin/manage-category.php');
 
}

?>
