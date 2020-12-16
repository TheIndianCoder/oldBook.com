<?php  require('include/header.inc.php');  ?>

<?php require('include/connection.inc.php');
 $msg='';

 if(isset($_POST['submit'])) {

    $username=mysqli_real_escape_string($con,$_POST['username']);
    //mysqli_real_escape_string() // Scan string of input;
    $mobile=mysqli_real_escape_string($con,$_POST['mobile']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=mysqli_real_escape_string($con,$_POST['password']);

    $secure=base64_encode($password); //security of password.

    

  /* $q="select * from login where email='email'" ;
   $result=mysqli_query($con,$q);
   
   $b=mysqli_num_rows($result);
   if($b!=0)
 {  
   header('location:login.php');
   $msg='This email is Already Registred';
 }
else
{ */

   $sql="insert into login (name,mobile,email,password) values ('$username','$mobile','$email','$secure')" ;

   $res=mysqli_query($con,$sql);

    
  
   header('location:login.php');
  
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
        <h2 style="margin-top: 10px; margin-bottom: 15px; color: blue;text-align: center;">Create An Account</h2>
        <form method="post" >
         <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" placeholder="name" required="required">
          </div>
          <div class="form-group">
            <label>Mobile Number</label>
            <input type="phone" name="mobile" class="form-control" placeholder="Mobile_number" required="required">
          </div>
          <div class="form-group">
            <label>E-mail ID</label>
            <input type="email" name="email" class="form-control" placeholder="E_mail Id" required="required">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="password" required="required">
          </div>
         <center> <button style="margin-bottom: 11px;" type="submit" name="submit" class="btn btn-primary"> Submit</button></center>      
        </form>

       </div> 
       
    </div>
  </div>
  <spam>
  <button class="btn btn-danger" style="margin: 8px; margin-left: 40px;" onclick="document.location = 'login.php'" >login</button></spam>


  <?php  require('include/footer.inc.php');  ?>
