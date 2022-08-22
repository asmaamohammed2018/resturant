<?php include('partials-front/menu.php');?>
<?php
//pass id of selected category
if(isset($_GET['catogry_id']))
{
$category_id=$_GET['catogry_id'];
$sql="SELECT title FROM tbl_category WHERE id=$category_id";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
$category_title=$row['title'];
}
else{
header('location:'.SITEURL);

}





?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
         <!-- <h2>Foods on <a href="#" class="text-white">"Category"</a></h2> !-->

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2>Foods on <a href="#" class="text-Red">"<?php echo $category_title;?>"</a> </h2>
<?php
//food of specific cateogry
$sql2="SELECT * FROM tbl_food WHERE catogry_id=$category_id";
$res2=mysqli_query($conn,$sql2);
$count2=mysqli_num_rows($res2);
if($count2>0)
{
while($row2=mysqli_fetch_assoc($res2))
{
    $id=$row2['id'];
    $title=$row2['title'];
$price=$row2['price'];
$descrpition=$row2['descrpition'];
$image_name=$row2['image_name'];
?>


<div class="food-menu-box">
               

                <div class="food-menu-desc">
                    <?php
                    if($image_name=="")
                    {
                        "<div class='error'>Image nor Available</div>";

                    }
                    else {
                        ?>
                        <img src="<?php echo SITEURL;  ?>images/food/<?php echo $image_name; ?>"alt="Pizza" class="img-responsive img-curve">
                        <?php


                    }
                    ?>
                
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price">$<?php echo $price; ?></p>
                    <p class="food-detail">
                        <?php echo $descrpition; ?>

                </p>
                    <br>

                    <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>
<?php



}
}
else {
    echo "<div class='error'>Food not Available</div>";
}


?>






            

           
            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php');?>
