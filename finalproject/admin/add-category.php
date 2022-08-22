<?php include('partials/menu.php'); ?>
<div class="main">
    <div class="wrapper" >
        <h1> Add category</h1>
        <br> <br>
        <?php
if(isset($_SESSION['add']))
{

    echo $_SESSION['add'];
    unset($_SESSION['add']);
}

if(isset($_SESSION['upload']))
{

    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}

?>
<br><br>
<form action="" method="POST" enctype="multipart/form-data">
    <table class="tbl-30">
 <tr>
    <td>Title: </td>
<td> 
    <input type="text" name="title" placeholder="Category Title">
</td>
</tr>

<tr>
    <td> Select Image: </td>
    <td>
    <input type="file" name="image">
</td>
</tr>     



<tr>
    <td>Featured: </td>
<td> 
    <input type="radio" name="featured" value="Yes"> Yes 
    <input type="radio" name="featured" value="No"> No 

</td>
</tr>

<tr>
    <td>Active: </td>
<td> 
    <input type="radio" name="active" value="Yes"> Yes 
    <input type="radio" name="active " value="No"> No 

</td>
</tr>
  
<tr>
    <td colspan="2">
        <input type="submit" name="submit" value="Add" class="btn-secondary">
</table>
</form>

<?php 
if(isset($_POST['submit']))
{
//take vaule of catogry
$title=$_POST['title'];
if(isset($_POST['featured']))
{
//if exist choice
$featured=$_POST['featured'];
}
else{
    //if don't exist choice,default no
    $featured="No";
}

if(isset($_POST['active']))
{
//if exist choice
$active=$_POST['active'];
}
else{
    //if don't exist choice,default no
    $active="No";
}

//check if upload image or not
//display it
if(isset($_FILES['image']['name']))
{
    //upload image
    $image_name=$_FILES['image']['name'];
    if($image_name!=""){
//ext var for extension like png,jpg .. etc
$ext=end(explode('.',$image_name));
//give images names Food_Cateogry_010.jpg
$image_name="Food_Category_".rand(000,999).'.'.$ext;





    $source_path=$_FILES['image']['tmp_name'];

    $destination_path="../images/category/".$image_name;

$upload=move_uploaded_file($source_path,$destination_path);

//failed to upload image
if($upload==false)
{
    $_SESSION['upload']="<div class='error'>Failed to upload Image </div>";
header('location:' .SITEURL. 'admin/add-category.php');
die();
}
}
}
else{
    //if image not uploaded
    $image_name="";

}
//SQL take values to database
$sql="INSERT INTO tbl_category SET
title='$title',
image_name='$image_name', 
featured='$featured',
active='$active'
";
$res = mysqli_query($conn,$sql);
if ($res==true)
{
    $_SESSION['add']="<div class='success'> Category Added Successfully </div>";
    header('location:'.SITEURL.'admin/manage-category.php');
}
else{


$_SESSION['add']="<div class='error'> Failed to Add Category, Try Again! </div>";
header('location:'.SITEURL.'admin/add-category.php');
}




}

?>

</div>
</div>

<?php include('partials/footer.php'); ?>
