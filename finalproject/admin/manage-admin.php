<?php include ('partials/menu.php'); ?>

<!--content part-->
<div class="main">
<div class="wrapper">
<h1>Mange Admin</h1>
<br />
<?php
if(isset($_SESSION['add'])) 
{
    echo $_SESSION['add']; //display session message
    unset($_SESSION['add']); //remove session message
}
if(isset($_SESSION['delete']))
{
echo $_SESSION['delete'];
unset($_SESSION['delete']);

}

if(isset($_SESSION['update']))
{
echo $_SESSION['update'];
unset($_SESSION['update']);

}




?>
<br> <br>  <br> 

<a href="add-admin.php" class="btn-primary">Add Admin </a>
<br /><br /> <br />
<table class="tbl-full">
    <tr>
<th>serial number </th>
<th> Full Name </th>
<th>User name</th>
<th>Action</th>
</tr>

<?php
//get Admins from admin table in database
$sql="SELECT * FROM tbl_admin";
//Excute
$res= mysqli_query($conn,$sql);

if ($res==TRUE)
{
    $count=mysqli_num_rows($res);
$sn=1; //autoincrement of id 
if ($count >0)
{
    while($rows=mysqli_fetch_assoc($res))
{ //display database 
$id=$rows['id'];
$full_name=$rows['full_name'];
$username=$rows['username'];


?>

<tr>
<td><?php echo $sn++; ?>. </td>
<td> <?php echo $full_name; ?> </td>
<td><?php echo $username; ?> </td>
<td>
<a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>"class= "btn-secondry">Update</a>
<a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class= "btn-third">Delete</a>
</td>
</tr>

<?php

}
}
else //there is no data in database
{

}
}
?>




</table>

</div>
</div>
    
<?php include ('partials/footer.php'); ?>
