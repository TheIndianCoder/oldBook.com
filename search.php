<?php 
      
       require('include/header.inc.php');

       require('include/connection.inc.php');

       require('include/function.inc.php'); 
  ?>
<?php  
if(isset($_GET['submit'])){

          $value=get_safe_value($con,$_GET['query']);

          $result=mysqli_query($con,"SELECT * FROM bdata WHERE keyword LIKE '%$value%'");
                
 ?>
 <!-- SEARCH PRODUCT START -->
 <section>
    <div class="container">
        <div class="row">
            <?php 

              while($fetch = mysqli_fetch_array( $result)){ 

             $pro_id=$fetch['B_id'];
             $name=$fetch['B_name'];
             $image1=$fetch['B_img1'];
             $price=$fetch['B_price'];
             $writer=$fetch['B_writer'];

             ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
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
          <!-- SEARCH PRODUCT END -->

<?php  

}   

 ?>
       
       <br>
       <br>
       




  <?php 
         
         require('include/footer.inc.php');
      
   ?>