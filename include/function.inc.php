<?php 
@session_start();


//GET SAFE INPUT IN DATABASE.....

function get_safe_value($con,$str){
    require('include/connection.inc.php');
  if($str!=''){
    return mysqli_real_escape_string($con,$str);
  }
}
//SECURE PASSWORD THROUGH INCREPT FUNCTION ......
function store_secure_password($str){
  if($str!=''){
    return base64_encode($str);
  }
    
}

// PRINT DATA THROUGH PRINT_R()...
function pre($str){
    require('include/connection.inc.php');
    echo "<pre>";
    print_r($str);
    die();
}

function home_first_product(){

	    require('include/connection.inc.php');
       ?>
       
       <?php 
           $q="select *  from  bdata order by rand() LIMIT 0,8 " ;

           $result = mysqli_query($con,$q);

        
           $b = mysqli_num_rows($result);

           if($b != 0)
           {
            

        ?>
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
         <?php           	
        }
        ?>
        </div>
        
        <?php         
}

// Book Category Area Start------------

function book_category(){
    require('include/connection.inc.php');  

?>
   <section>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-6">
    <h4><center> Book Catagories</center></h4>
    <hr>
    <br>
    <ul class="nav">
        
<?php  
   
    $cat_id="SELECT * FROM b_cat ";
     
    $q=mysqli_query($con,$cat_id);
                        

     while($fetch=mysqli_fetch_array($q)){
        $cat_id=$fetch['cat_id'];
        $cat=$fetch['B_cat'];
 ?>  
        <li class="nav-item">
            <center>
            <strong><a style="color: black;" href='<?php  echo"cat.php?cat_id=$cat_id "; ?>' class="nav-link"><?php echo "$cat"; ?></a></strong></center>
        </li>
    <?php  } ?>
    </ul>
    </div>
    </div>
</div>
</section>
<br>
<hr>
<br>
<?php 
}
?>


<?php 

// Book Category Area Start------------

// Selling page function
function sellingquery(){
       
    require('include/connection.inc.php'); 

    $user_email=$_SESSION['u_email'];

    
    
    if(isset($_POST['submit'])){

      // Seller Details.....

    $q="SELECT * FROM login WHERE email='$user_email'";
    $run=mysqli_query($con,$q) or dia('selling function query error');

    $fetch=mysqli_fetch_array($run);

    $seller_name=$fetch['name'];
    $seller_mobile=$fetch['mobile'];
    $seller_password=$fetch['password'];
    $seller_emaile=$fetch['email'];
    $seller_id=$fetch['u_id'];


   
    $B_name=mysqli_real_escape_string($con,$_POST['B_name']);
    $B_writer=mysqli_real_escape_string($con,$_POST['B_writer']);
    $B_price=mysqli_real_escape_string($con,$_POST['B_price']);
    $B_pub=mysqli_real_escape_string($con,$_POST['B_pub']);
    $B_des=mysqli_real_escape_string($con,$_POST['B_des']);
    $B_key=mysqli_real_escape_string($con,$_POST['B_key']);
    $state=mysqli_real_escape_string($con,$_POST['state']);
    $dist=mysqli_real_escape_string($con,$_POST['dist']);
    $pin_code=mysqli_real_escape_string($con,$_POST['pin_code']);
    $seller_phone=mysqli_real_escape_string($con,$_POST['s_mobile']);
    $show_phone=mysqli_real_escape_string($con,$_POST['on_number']);
    $cat_id=mysqli_real_escape_string($con,$_POST['cat']);

    // Book image uploading.

    $image1=mysqli_real_escape_string($con,$_FILES['B_img1']['name']);
    $image2=mysqli_real_escape_string($con,$_FILES['B_img2']['name']);


    //image temp name....

    $temp_img1=mysqli_real_escape_string($con,$_FILES['B_img1']['tmp_name']);
    $temp_img2=mysqli_real_escape_string($con,$_FILES['B_img2']['tmp_name']);

    // uploading in folder......

    $folder1="image/".$image1;
    $folder2="image/".$image2;
    

    move_uploaded_file($temp_img1,$folder1);
    move_uploaded_file($temp_img2,$folder2);



    $sql="INSERT INTO  bdata (cat_id ,seller_id   ,B_name,B_img1,B_img2,B_price,B_writer,B_pub,B_des,date,keyword ,state,dist,pincode,seller_number,show_phone)VALUES
        ('$cat_id','$seller_id','$B_name' , '$folder1','$folder2','$B_price', ' $B_writer','$B_pub','$B_des',NOW(),'$B_key','$state','$dist','$pin_code','$seller_phone','$show_phone') " ;

    $run= mysqli_query($con,$sql);

     if($run){
     	echo "<script>alert('Product insert succesfully')</script>";

     }else{
        echo "<script>alert('Product insert not succesfully')</script>";
     }
 }

}

function repot()
{
    include 'include/connection.inc.php';

    if(isset($_GET['repot']))
    {
        $repot_id=$_GET['repot'];

    $sql="INSERT INTO repot (id,repoted_id) VALUES ('','$repot_id') ";
    $result=$con->query($sql) or die('Repot query not run');
        if($result)
        {
          ?>
           <script>alert('Thanks for repoting');</script>
          <?php
        }
    }

}







 ?>