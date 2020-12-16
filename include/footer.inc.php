<!--- Footer Area Start   -->
 <footer class="bg-dark text-white">
 	<div class="container py-3">
 		<div class="row">
 			<div class="col-lg-3 pb-2">
 				<h4>Contact Us</h4>
 				<a href="#">
 					<img src="image/logo.png" width="170" height="60">
 				</a>
 				<br>
 				<address>
 					<ul >
                        <li>
                            <i class="flaticon-location"></i>
                                Rajiv Nagar , patliputra Patna - 13
                        </li>
                        <li>
                            <i class="flaticon-technology"></i>
                            <span>Phone-</span>
                                    (+91)8709365153
                        </li>
                        <li>
                            <i class="flaticon-web"></i>
                            <span>Email Id-</span>
                                       Mkumar870936@gmail.com
                        </li>
                    </ul>
 				</address>
 				
 			</div>

            <div class="col-lg-3 pb-2">
 				<h4>Useful Links</h4>
 				<ul class="list-unstyled">
 					<li><a href="#" class="links">Home</a></li>
 					<li><a href="login.php"  class="links">Login</a></li>
                    <li><a href="registration.php.php"  class="links">New User</a></li>
 					<li><a href="sell.php"  class="links">Sell with us</a></li>
 					<li><a href="about.php"  class="links">About Us</a></li>
                    <li><a href="about.php"  class="links">Contect Us</a></li>
 				</ul>
 			</div>


 			<div class="col-lg-3 pb-2">
 				<h4>About Us</h4>
 				<p>Every wanted to buy a book but could not because 
                    it was too expensive ? worry not because our team 
                    is available here.these day our team is in market for you,our team is committed to bring to you all kind of best old book at the minimal prices compare to market .
                    In this old book  plateform every student or person sell own book and buy book of second person or student easily.  
 			     </p>
 			</div>
 			<div class="col-lg-3 pb-2">
 				<h4>Subscribe Our E_mail For Current Information.</h4>

                    <form  method="post">
                        <div>
                             <input class="form-control-mr-sm-2" id="search" type="email" name="user_email" placeholder="Enter E_mail address"enctype="multipart/form-data" style="padding: 5px  ">
                        </div><br>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-primary" type="submit"  name="click" style="margin-left: 8px">Subscribe Us</button>
 			</div>
            <?php 
            require('include/connection.inc.php');
        
              
          
    if(isset($_POST['click'])){


       $user_email=mysqli_real_escape_string($con,$_POST['user_email']);

       $sql=" INSERT INTO user_email(user_email) VALUES ('$user_email') ";

       $run= mysqli_query($con,$sql);
    }
            //footer_user_email();
             ?>
 			
 	       <div class="container-fluide text-center  py-2"
            >
            
                
 		        <h6 > &copy; 2020. All Rights are reserved.</h6>
                 
            
 	       </div>
       </form>
   </div>
</div>
</div>

        
 <!--- Footer Area End   -->

<link rel="stylesheet"  href="js/bootstrap.min.js">
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
</body>
</html>