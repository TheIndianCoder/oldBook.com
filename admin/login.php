<?php  
@session_start();
?>
 <?php 
        require('include/header.inc.php'); 
         
        require('include/connection.inc.php'); 
  ?>

  <?php 
       
       $msg='';

if(isset($_POST['email']) && ($_POST['password'])){



$email=mysqli_real_escape_string($con,$_POST['email']);
$password=mysqli_real_escape_string($con,$_POST['password']);

$secure=base64_encode($password); //security of password .

$q="select * from login where email='$email' && password='$secure' && status=1";
$result=mysqli_query($con,$q);

$b=mysqli_num_rows($result);


if($b!=0)
{ 
    $_SESSION['u_email']=$email;
    header('location:index.php');
    
 }
else
{
    $msg="Please Enter Correct login Details";
    //header('location:login.php');
}

}

   ?>
 

<form method="post">
	<div class="container">
   
    <div class="row">
       <div class="col-sm-12 col-lg-12 col-md-12">
        <strong><center>Admin Login</center></strong>
        
         
          <div class="form-group">
            <label>E-mail ID</label>
            <input type="email" name="email" class="form-control" placeholder="E_mail Id" required="required">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="password" required="required">
          </div>
          
          <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">LogIn</button>
              <?php echo "$msg";  ?>
      
        </form>   
    </div>
  </div>

  </div>
  <button class="btn btn-danger" style="margin: 8px; margin-left: 40px;" onclick="document.location = 'registration.php'" >New User</button>
  <button class="btn btn-danger" onclick="document.location = 'forget.php'">forget</button>

	

	
<?php// require('include/footer.inc.php');  ?>