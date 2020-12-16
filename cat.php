<?php require('include/header.inc.php');

       require('include/connection.inc.php');

       require('include/function.inc.php'); 

 ?>

<!--- Carousel Area Star --->

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="image/logo.png" class="d-block w-100" alt="" height="300">
		</div>
	</div>
</div>
<br>

<!--- Carousel Area End --->


<!-- Catagory Area Start  --->

<?php  book_category();  ?>

<!-- Catagory Area End  --->

<?php   

   if(isset($_GET['cat_id'])){

   	$cat_id=$_GET['cat_id'];

   
  
   $q="SELECT * FROM bdata WHERE cat_id ='$cat_id' ";
    $run=mysqli_query($con,$q);
?>
    <section>
    	<div class="container">
    		<div class="row">
<?php 
    			 while($fetch=mysqli_fetch_array($run)){

    			 	$pro_id=$fetch['B_id'];
                    $name=$fetch['B_name'];
                    $image1=$fetch['B_img1'];
                    $price=$fetch['B_price'];
                    $writer=$fetch['B_writer'];
                  
?>
    			<div class="col-lg-3 col-md-4 col-sm-12">
    				<form>
                    
                    <div class="card-body">
                        <h5> <?php echo "$name"; ?> </h5>
                        <a href='<?php echo" details.php?id=$pro_id"; ?>'><img style="margin-right: 5px;" src='<?php echo"$image1"; ?>' class="image-fluid mb-2" height="180" width="210"></a>
                         <h6 style="font-size: 20px;">&#8360-<?php echo "$price"; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='<?php echo "details.php?id=$pro_id"; ?>'>Details</a> </h6>
                       
                    </div>  
                </form> 
    			</div>
    		<?php } ?>
    		</div>
    	</div>
    </section>
<?php } ?>
   






 <?php require('include/footer.inc.php');  ?>