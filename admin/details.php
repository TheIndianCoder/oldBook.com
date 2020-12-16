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
             $status=$fetch['status'];           
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
                <li><span>Product Id :- </span> <?php echo "$pro_id";  ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <?php
                    if($status==1){
                           echo "<a href ='?type=status&operation=deactive&id=$pro_id'><button class='btn btn-success'>Active</button></a>";
                    }else{
                           echo "<a href ='?type=status&operation=active&id=$pro_id'><button class='btn btn-danger'>Block</button></a>";
                    }

                  ?>
                </ul>
          </div>
                                    
        </div>
      </div>
    </div>              
    <?php 
//PRODUCT ACTIVE DEACTIVE PHP CODE.......
    if(isset($_GET['type']) && $_GET['type']!=''){

        $type=$_GET['type'];
        if($type=='status'){
            $operation=$_GET['operation'];
            $id=$_GET['id'];

            if($operation=='active'){
                $status=1;
            }else{
                $status=0;
            }

            $product_status_sql="UPDATE bdata set status='$status' where B_id=$id";
            $con->query($product_status_sql) or die('query error');
            if($con){
                header("location:details.php?type=view&operation=details&id=$pro_id");
            }
        }
    }

    ?>
                               
    