<?php include('partials/menu.php'); ?>
<div class="main">
    <div class ="wrapper">
    <h1> Manage Food </h1>

    <br /><br />
<a href="<?php echo SITEURL; ?>admin/add-food.php" class="btn-primary">Add Food </a>

<br /><br />
<?php

if(isset($_SESSION['add']))
{

    echo $_SESSION['add'];
    unset($_SESSION['add']);
}
if(isset($_SESSION['delete']))
{

    echo $_SESSION['delete'];
    unset($_SESSION['delete']);
}
if(isset($_SESSION['upload']))
{

    echo $_SESSION['upload'];
    unset($_SESSION['upload']);
}
if(isset($_SESSION['unauthorized']))
{

    echo $_SESSION['unauthorized'];
    unset($_SESSION['unauthorized']);
}
if(isset($_SESSION['update']))
{

    echo $_SESSION['update'];
    unset($_SESSION['update']);
}

?>

<table class="tbl-full">
    <tr>
<th>serial number</th>
<th> Title </th>
<th>Price</th>
<th>Image</th>
<th>Featured</th>
<th>Active</th>
<th>actions</th>
</tr>
<?php 
$sql="SELECT * FROM tbl_food"; //get query database var
$res=mysqli_query($conn,$sql); //excute query var
$count=mysqli_num_rows($res); //count row var
$sn=1; //serial no. var
//exist data in database
if($count>0)
{
while($row=mysqli_fetch_assoc($res))
{
    $id=$row['id'];
    $title=$row['title'];
    $price=$row['price'];
    $image_name=$row['image_name'];
    $featured=$row['featured'];
    $active=$row['active'];
    ?>
<tr>
<td><?php echo $sn++; ?>. </td>
<td> <?php echo $title; ?> </td>
<td> <?php echo $price; ?> </td>


<td> <?php 
if($image_name!="")
{
    ?>
    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px" >
    <?php
}


else{
    echo "<div class='error'>Image not Added</div>";
}


?> 
</td>


<td> <?php echo $featured; ?> </td>
<td> <?php echo $active; ?> </td>

<td>
<a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id;?>" class= "btn-secondry">Update</a>
<!-- delete id and image-->

<a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id ?>
&image_name=<?php echo $image_name; ?>" class= "btn-third">Delete</a>
</td>
</tr>



    <?php

}
}
//don't exist data in database
else{
//break php
    ?>
<tr>
    <td colspan="7"> <div class="error">No Food Added </div> </td>
</tr>

    <?php

}
?>
 
</table>

</div>
</div>
<?php include('partials/footer.php'); ?>