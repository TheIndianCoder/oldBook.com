<?php 

       @session_start();
       require('include/header.inc.php');

       require('include/connection.inc.php');

       require('include/function.inc.php'); 

       $u_email= $_SESSION['u_email'];

 ?>

 <?php 
 
   $q="SELECT * FROM login WHERE email='$u_email'";
    $run=mysqli_query($con,$q);

    $fetch=mysqli_fetch_array($run);

    $u_name=$fetch['name'];
    $u_mobile=$fetch['mobile'];
    $u_id=$fetch['u_id'];
    $u_password=$fetch['password'];
    $u_emaile=$fetch['email'];
  ?>
 <section>
 <div class="container">
 	<div class="row">
 		<div class="col-lg-12 col-md-12 col-sm-6">
 			<center><h4>Welcome <?php echo "$u_name"; ?></h4></center>
 			<hr>
            <br>
            <ul class="nav">
            	<li class="nav-item">
            		<h5>Your profile :-</h5>
            		<ul >
            			<li >
            				 Name:-<strong>&nbsp;&nbsp; <?php  echo "$u_name"; ?></strong>
            			</li>
            			<li>
            				 Mobile Number:-<strong>&nbsp;&nbsp;<?php  echo "$u_mobile"; ?></strong>
            			</li>
            			<li >
            				 Email Id:-<strong>&nbsp;&nbsp;<?php  echo "$u_emaile"; ?></strong>
            			</li>
            		</ul>
            	</li>
            </ul><br>
            <ul class="nav">
            	<li class="nav-item">
            		<!--<a href="edit_profile.php" class="nav-link text-dark"> Edit Your profile</a>-->
            	</li>
            </ul><br>
 		</div>
 	</div>
 			

 </div>
 </section>




 <?php 
     
     require('include/footer.inc.php');
  
  ?>