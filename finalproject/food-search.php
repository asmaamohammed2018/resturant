<?php include('partials-front/menu.php');?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php 
            //get keyword of search
            $search=$_POST['search'];

            ?>



            
           <!-- <h2>Foods on Your Search <a href="#" class="text-white"><?php echo $search; ?>"</a></h2> !-->

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2>Foods on Your Search <a href="#" class="text-Red">"<?php echo $search; ?>"</a></h2>
<?php
//sql to comapre entered keyword with exist food
$sql="SELECT * FROM tbl_food WHERE title LIKE'%$search%' OR descrpition LIKE '%$search%'";
$res=mysqli_query($conn,$sql);
$count=mysqli_num_rows($res);
if ($count>0)
{
    //exist
while($row=mysqli_fetch_assoc($res))
{

$id=$row['id'];
$title=$row['title'];
$price=$row['price'];
$descrpition=$row['descrpition'];
$image_name=$row['image_name'];
?>

<div class="food-menu-box">
                <div class="food-menu-img">
                    <?php
                    if($image_name=="")
                    {
                        echo"<div class='error'>Image not Avaliable </div>";



                    }
                    else{
                        ?>
<img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                        <?php


                    }
                    ?>
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price">$<?php echo $price; ?></p>
                    <p class="food-detail">
                        <?php echo $descrpition; ?>
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

<?php

}
}
else{
//not exist
echo "<div class='error'>Food not found</div>";
}


?>
       <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php');?>
