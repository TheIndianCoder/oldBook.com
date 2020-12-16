<?php   
   
   require('include/header.inc.php');
   require('include/connection.inc.php');
   require('include/function.inc.php');

 ?>

 <?php 
     $msg='';
   if(isset($_GET['id'])){

        
         $book_id= $_GET['id'];      


         $q="SELECT * FROM bdata WHERE B_id ='$book_id' ";

         $result=mysqli_query($con,$q);

         $fetch=  mysqli_fetch_array($result);
         
             $date=$fetch['date'];
             $cat_id=$fetch['cat_id'];
             $pro_id=$fetch['B_id'];
             $name=$fetch['B_name'];
             $image1=$fetch['B_img1'];
             $price=$fetch['B_price'];
             $writer=$fetch['B_writer'];
             $image2=$fetch['B_img2'];
             $des=$fetch['B_des'];
             $publication=$fetch['B_pub'];
             $seller_number=$fetch['seller_number'];
             $state=$fetch['state'];
             $dist=$fetch['dist'];
             $pin_code=$fetch['pincode'];            
}

       ?>



       
<div class="container">
  <div class="row">
    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
      <div class="card-body">
        <img src='<?php echo "$image1"; ?>' height="500" width="450" alt='<?php echo "$name"; ?>'>
      </div>
    </div>
    <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
      <div class="card-body">
        <img src='<?php echo "$image2"; ?>' height="500" width="450" alt='<?php echo "$name"; ?>'>
      </div>
    </div>
  </div>
  <div class="col-md-9 col-lg-9 col-sm-12 col-xs-12 smt-40 xmt-40">
    <div class="ht__product__dtl">
      <h2> <?php echo "$name"; ?> </h2>
        <ul  class="pro__prize"><br>
                                    
          <li><span>Price :-  &#8360- </span> <?php echo "$price";  ?>&nbsp; </li><br>
          <li><span>Writer :- </span> <?php echo "$writer";  ?> </li><br>
          <li><span>Publication :- </span> <?php echo "$publication";  ?> </li><br>
          <li><span id="showd">Description </span></li><br>
             <p id="des"><?php echo "$des"; ?> </p><br>
             <script type="text/javascript">
               $("#des").hide();
               $(document).ready(function(){
                $("#showd").click(function(){
                  $("#des").toggle(100);
                });
               });
             </script>
        </ul>
        
          <div>
            <ul>
                <li><span>Catagery :- </span> 
                  <?php
                   $query=mysqli_query($con,"SELECT * FROM b_cat WHERE cat_id='".$cat_id."'") or die("Query Error");
                   $fetch=mysqli_fetch_array($query);
                     $id=$fetch['cat_id'];
                     $cat=$fetch['B_cat'];
                  ?>
                <a style="color: black; text-decoration: none;" href='<?php echo"cat.php?cat_id=$id"; ?>'><?php echo"$cat"; ?></a></li>
                <br>
                <li><span>Publish Date :- </span> <?php echo "$date";  ?> </li><br>
                <li><span>Contect Seller via Email and Mobile Number :- </span> 
                 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                <button class="btn btn-success" id="show">Contect</button> </li><br>

                <li id="contect"><span>Seller Number :- </span> <?php echo "$seller_number";  ?> </li><br>
                <script type="text/javascript">
                  $("#contect").hide();
                  $(document).ready(function(){
                     $("#show").click(function(){
                       $("#contect").toggle(1000);
                     });
                  });
                </script>

                <li><span>Book Id :- </span> <?php echo "$pro_id";  ?>
                 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                <a <?php echo "href=report.php?type=Report&id=$book_id"; ?>><button class="btn btn-danger" type="submit" name="repot">Report_Id</button></a> </li>


            </ul>
          </div>
                                    
        </div>
      </div>
    </div>              
    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-sm-12 col-md-4">
            <center><h2>Seller Information...</h2></center>
            <?php
    // GET SELLER ID FROM BOOK TABLE.....
            $q="SELECT * FROM bdata WHERE B_id='$book_id'";
            $run=mysqli_query($con,$q) or dia('query error');

            $fetch=mysqli_fetch_array($run);

            $seller_id=$fetch['seller_id'];
                 
            ?>
            <?php
//  GET SELLER INFORMATION FROM LOGIN TABLE....
            $q="SELECT * FROM login WHERE u_id='$seller_id'";
            $run=mysqli_query($con,$q);

            $fetch=mysqli_fetch_array($run);

            $seller_name=$fetch['name'];
            $seller_mobile=$fetch['mobile'];
            $seller_id=$fetch['u_id'];
            $seller_password=$fetch['password'];
            $seller_emaile=$fetch['email'];        

            ?>
             <ul class="nav">
              <li class="nav-item">
                <h5>Seller profile :-</h5>
                <ul >
                  <li >
                     Name:-<strong>&nbsp;&nbsp; <?php  echo "$seller_name"; ?></strong>
                  </li>
                  <li>
                     Mobile Number:-<strong>&nbsp;&nbsp;<?php  echo "$seller_mobile"; ?></strong>
                  </li>
                  <li >
                     Email Id:-<strong>&nbsp;&nbsp;<?php  echo "$seller_emaile"; ?></strong>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
      

    </section>
                               
    <br>
    <center><strong><h5>Related Book </h5></strong></center><br>
    

    <section>
      <div class="container">
        <div class="row">

          <?php 
           
          $qu="SELECT * FROM bdata WHERE  cat_id ='$cat_id' LIMIT 0,4 ";
          $run=mysqli_query($con,$qu);

          while($fetch=mysqli_fetch_array($run)){
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

 
 <?php  
   
   require('include/footer.inc.php');

 ?>