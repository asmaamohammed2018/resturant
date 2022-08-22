<?php include('partials/menu.php'); ?>


<div class="main">
    <div class="wrapper">
    <h1> Update Admin </h1>
    <br> <br>


<!-- before update need to old admin info -->
<?php 
//id
$id=$_GET['id'];

//SQL
$sql="SELECT * FROM tbl_admin WHERE id=$id";
$res=mysqli_query($conn,$sql);

if ($res==true)
{
    $count=mysqli_num_rows($res);
    //if admin in avaliable 
    //update
if ($count==1)
    {
$row=mysqli_fetch_assoc($res);
//var have full_name
$full_name=$row['full_name'];
//var have username
$username=$row['username'];
//var have password
$password=$row['password'];

    }
//if admin in not avaliable 
//keep in current page
    else
    {
        header('location:' .SITEURL. 'admin/manage-admin.php');
    
}

}

 ?>
<form action="" method="POST">
<table class="tbl-30">
    <tr>
        <td> Full Name: </td>
        <td>
<input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
</tr>


<tr>
        <td>UserName:</td>
        <td>
<input type="text" name="username" value="<?php echo $username; ?>"></td>
</tr>

<tr>
        <td>Password:</td>
        <td>
<input type="Password" name="Password" value=""></td>
</tr>


<tr>
<td colspan="2">
<input type="hidden" name="id" value="<?php echo $id; ?>"> 
     <input type="submit" name="submit" value="Update" class="btn-secondary">
</td>
</tr>

    </table>
    </form>

</div> 
</div>

<!-- after taking updated data 
check if user click on submit button or not 
<?php
if (isset($_POST['submit']))
{
$id=$_POST['id'];
 $full_name=$_POST['full_name'];
$username=$_POST['username'];
$password=$_POST['password'];

//SQl update data in database
$sql="UPDATE tbl_admin SET 

full_name='$full_name',
username='$username' 
WHERE id='$id'
";
$res=mysqli_query($conn,$sql);

//check if updated success or fail
if ($res==true)
{
    $_SESSION['update']="<div class='success'> Admin Updated Successfully </div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else{
$_SESSION['update']="<div class='error'> Failed to Update Admin, Try Again! </div>";
header('location:'.SITEURL.'admin/add-admin.php');
}
}

?>



<?php include('partials/footer.php'); ?>

