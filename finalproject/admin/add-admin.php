<?php include('partials/menu.php'); ?>
<div class="main">
    <div class="wrapper">
        <h1>Add </h1>
        <br><br>
<?php
if(isset($_SESSION['add']))
{

    echo $_SESSION['add'];
    unset($_SESSION['add']);



}
?>

        <form action="" method="POST">
        <table class="tbl-30">
            <tr>
                <td>Full Name: </td>
                <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
</tr>

<tr>
                <td>UserName:</td>
                <td><input type="text" name="username" placeholder="Enrer Your username"></td>
</tr>

<tr>
                <td>Password:</td>
                <td><input type="password" name="password" placeholder="Your Password"></td>
</tr>
 <td colspan="2">
     <input type="submit" name="submit" value="Add" class="btn-secondary">
</table>
</form>

            </div>
</div>
<?php include('partials/footer.php'); ?>


<?php 
//Check if data submitted
if(isset($_POST['submit']))
{
//if data submitted take the data from form to database
$full_name=$_POST['full_name'];
$username=$_POST['username'];
$password=$_POST['password'];

//SQL
$sql="INSERT INTO tbl_admin SET
full_name='$full_name',
username='$username',
password='$password'
";

//SQL & send data to database

$res = mysqli_query($conn, $sql) or die(mysqli_error());

//Check if data send to database

if ($res==TRUE)
{
    $_SESSION['add']="<div class='success'> Admin Added Successfully </div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
else{


$_SESSION['add']="<div class='error'> Failed to Add Admin, Try Again! </div>";
header('location:'.SITEURL.'admin/add-admin.php');
}


}

?>

