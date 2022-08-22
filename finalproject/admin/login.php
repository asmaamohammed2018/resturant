<?php include('../config/constants.php') ?>
<html>
    <head>
     <title>Login-Food order </title>
     <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="login">
        <h1 class="text-center"> login </h1> <br> <br>
        <?php
        if(isset($_SESSION['login'])) 
{
    echo $_SESSION['login']; //display session message
    unset($_SESSION['login']); //remove session message
}
if (isset($_SESSION['no-login-message']))
{


    echo $_SESSION['no-login-message'];
    unset($_SESSION['no-login-message']);
}
?>
<br> <br>

<form action="" method="POST" class="text-center">
    Username: <br>
    <input type="text" name="username" placeholder="Enter Username"> <br> <br>
    Password: <br>
    <input type="password" name="password" placeholder="Enter Password"> <br> <br>
    <input type="submit" name="submit" value="login" class="btn-primary">


</form>


    </div>


</body>
</html>


<?php
if (isset($_POST['submit']))

{ //take data from form
     $username=$_POST['username'];
     $password=$_POST['password'];
//check data is exist or not
$sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password' 
";
$res=mysqli_query($conn,$sql);
//count rows to check user exist
$count=mysqli_num_rows($res);
if($count==1)
{
//exist
$_SESSION['login']= "<div class='success'> Login Successful </div>"; 
//check if logged
$_SESSION['user']= $username; 


//Returned to Home page

header('location:'.SITEURL. 'admin/');
  }
else
{
    $_SESSION['login']= "<div class='error text-center'> Login Failed </div>"; 
//Returned to page
header('location:'.SITEURL. 'admin/login.php');
  }
}






?>


