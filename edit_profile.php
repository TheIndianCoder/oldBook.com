<?php 

       @session_start();
       require('include/header.inc.php');

       require('include/connection.inc.php');

       require('include/function.inc.php'); 

       $u_email= $_SESSION['u_email'];

 ?>

 <?php 
  
  if(isset($_POST['submit'])){

    $username=$_POST['username'];
    $mobile=$_POST['mobile'];
    
    
    $q="UPDATE login SET name = '$username'  WHERE email=$u_email ";
    $run=mysqli_query($con,$q);

    //header('location:u_account.php');
    
  }


  ?>

 <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-lg-12 col-md-12" style="background-color: blue;">
        
      </div>
    </div>
</div>

<div class="container">
    <div class="row">
       <div class="col-sm-12 col-lg-12 col-md-12">
        <h2 style="margin-top: 10px; margin-bottom: 15px; color: blue;">Edit your Account</h2>
        <form  method="post" >
         <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="name" required="required">
          </div>
          <div class="form-group">
            <label>Mobile Number</label>
            <input type="phone" name="mobile" class="form-control" placeholder="Mobile_number" required="required">
          </div>
          
          
         <center> <button style="margin-bottom: 11px;" type="submit" name="submit" class="btn btn-primary"> Edit</button></center>      
        </form>

       </div> 
       
    </div>
  </div>





 <?php 
     
     require('include/footer.inc.php');
  
  ?>