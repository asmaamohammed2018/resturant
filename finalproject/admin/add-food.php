<?php include('partials/menu.php'); ?>
<div class="main">
    <div class="wrapper" >
        <h1> Add Food</h1>
        <br> <br>
        <?php
if(isset($_SESSION['upload']))
{

    echo $_SESSION['upload'];
    unset($_SESSION['upload']);



}
?>

        
<form action="" method="POST" enctype="multipart/form-data">
    <table class="tbl-30">
 <tr>
    <td>Title: </td>
<td> 
    <input type="text" name="title" placeholder="Title of the Food">
</td>
</tr>

<tr>
    <td>Descrpition: </td>
<td> 
    <textarea name="descrpition" cols="30" rows="5" placeholder="Descrpition of the Food"></textarea>
</td>
</tr>

<tr>
    <td>Price: </td>
<td> 
    <input type="number" name="price">
</td>
</tr>

<tr>
    <td> Select Image: </td>
    <td>
    <input type="file" name="image">
</td>
</tr>     
<tr>
    <td> Category: </td>
    <td>
    <select name="category">

<?php
//display categorye which active
$sql="SELECT * FROM tbl_category WHERE active='YES'";
$res=mysqli_query($conn,$sql);
$count=mysqli_num_rows($res);
//check if exist category avaliable or not
if($count>0)
{
    //exist category
while($row=mysqli_fetch_assoc($res))
{
$id=$row['id'];
$title=$row['title'];
?>
    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

<?php
}
}
else{
//no category exist
?>
<option value="0"> No Category Found </option>
<?php
}

?>
</select>
    
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
</td>
</tr>
    </table>
</form>


<?php 
if(isset($_POST['submit']))
{
//take vaule of catogry
$title=$_POST['title'];
$descrpition=$_POST['descrpition'];
$price=$_POST['price'];
$category=$_POST['category'];

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
    if($image_name!="")
    {
//ext var for extension like png,jpg .. etc
$ext=end(explode('.',$image_name));
//give images names Food_Name_010.jpg
$image_name="Food_Name_".rand(000,999).'.'.$ext;
//current image
$src=$_FILES['image']['tmp_name'];
//new image
$dst="../images/food/".$image_name;
//upload
$upload=move_uploaded_file($src,$dst);

//failed to upload image
if($upload==false)
{
    $_SESSION['upload']="<div class='error'>Failed to upload Image </div>";
header('location:' .SITEURL. 'admin/add-food.php');
die();
}
    }
}
else{
    //if image not uploaded
    $image_name="";

}
//SQL take values to database
$sql2="INSERT INTO tbl_food SET
title='$title',

descrpition='$descrpition',

price=$price,
image_name='$image_name',
catogry_id=$category,
featured='$featured',
active='$active'
";

$res2 = mysqli_query($conn,$sql2);
if ($res2==true)
{
    $_SESSION['add']="<div class='success'> Food Added Successfully </div>";
    header('location:'.SITEURL.'admin/manage-food.php');
}
else{


$_SESSION['add']="<div class='error'> Failed to Add Food, Try Again! </div>";
header('location:'.SITEURL.'admin/manage-food.php');
}




}

?>



</div>
</div>

<?php include('partials/footer.php'); ?>
