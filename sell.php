<?php

      @session_start();
      require('include/header.inc.php'); 

      require('include/connection.inc.php');

      require('include/function.inc.php');
 
      if(!isset($_SESSION['u_email'])){
      	header('location:login.php');
      }else{
 ?>
<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-lg-12 col-md-12" style="background-color: blue;">
				
			</div>
		</div>
</div>
					
 
<div class="container">
		<div class="row">
		   <div class="col-sm-12 col-lg-12 col-md-12 m-auto d-block ">
		   <center>
		   
		   	<h3>Submit Datils of Book</h3></center>
		   	<table>
		   	<form  method="post" autocomplete="on" enctype="multipart/form-data">
		   		<div class="form-group">
		   			<label>BOOK NAME *</label>
		   			<input type="text" name="B_name" class="form-control" placeholder="Book Name........." required="required" >
		   		</div>
		   		<div class="form-group">
		   			<label>BOOK WRITER *</label>
		   			<input type="text" name="B_writer" class="form-control" placeholder="Book Writer......." required="required" size="30">
		   		</div>
		   		
		   		
		   		<div class="form-group">
		   			<label>BOOK PUBLICATION</label>
		   			<input type="text" name="B_pub" class="form-control" placeholder="Book Publication......."  size="30">
		   		</div>
		   		<div class="form-group">
		   			<label>BOOK PRICE *</label>
		   			<input type="text" name="B_price" class="form-control" placeholder="Book Price........." required="required" >
		   		</div>
		   		<div class="form-group">
		   			<label>BOOK IMAGE 1 *</label>
		   			<input type="file" name="B_img1" class="form-control"  required="required"  placeholder="First Image of Book..... " size="30">
		   		</div>
		   		<div class="form-group">
		   			<label>BOOK IMAGE 2</label>
		   			<input type="file" name="B_img2" class="form-control"   placeholder="Second Image of Book..... "  size="30">
		   		</div>
		   		<div class="form-group">
		   			<label>BOOK DESCRIPTION *</label>
		   			<textarea cols="50" rows="5" name="B_des" class="form-control" placeholder="About This Book......" required="required"></textarea>
		   		</div>
		   		<div class="form-group">
		   			<label>BOOK CATEGORY *</label><br>
		   			<select name="cat" id="select" style="height: 40px;width: 100%; padding-left:20px; border-radius:5px;" >
		   				<option>Select Category</option>
		   			  <?php  
                         $cat_id="SELECT * FROM b_cat ";
                         $q=mysqli_query($con,$cat_id);
                        

                         while($fetch=mysqli_fetch_array($q)){
                         	$cat_id=$fetch['cat_id'];
                             $cat=$fetch['B_cat'];
                             
                         	?>

                         	<option value='  <?php echo "$cat_id"; ?> '> <?php  echo "$cat"; ?> </option>

                         <?php

                         }

		   			 ?>

		   			</select>
		   		</div>
		   		<div class="form-group">
		   			<label>BOOK KEYWORD *</label>
		   			<input type="text" name="B_key" class="form-control" placeholder="keyword1,keyword2,keyword3,etc" required="required" size="30">
		   		</div>

		   		<h3><center>CONFERM YOUR LOCATION IN INDIA</center></h3>
		   		<!--select code of php-->
		   		<?php 
                  $run=mysqli_query($con,"SELECT * FROM state") or die("query not run");
		   		?>
		   		
		   		<div class="form-group">
		   			<label>SELECT STATE *</label>
		   			<select onchange="state(this.value)" style="height: 40px;width: 100%; padding-left:20px; border-radius:5px;">
		   				<option>SELECT STATE</option>
		   				<?php 
                          while($fetch=mysqli_fetch_array($run)){
                          	$id=$fetch['state_id'];
                            $state_name=$fetch['state_name'];
                        ?>
                          <option value='<?php echo"$id"; ?>'><?php echo "$state_name";?></option>
                        <?php
                          }
		   				?>
		   				
		   			</select>
		   		</div>
		   		<div class="form-group">
		   			<label>SELECT CITY *</label>
		   			<select id="city" style="height: 40px;width: 100%; padding-left:20px; border-radius:5px;">
		   				<option>SELECT CITY</option>
		   			</select>
		   		</div>
		   		<div class="form-group">
		   			<label>ENTER PIN CODE *</label>
		   			<input type="text" name="pin_code" class="form-control" placeholder="Enter Your Pin_code......" required="required" size="30">
		   		</div>


                <h3><center>CONFERM YOUR IDENTITY FOR PUBLIClY</center></h3><br><br>
                	<div class="form-group">
		   			<label>MOBILE PHONE NUMBER *</label>
		   			<input type="phone" name="s_mobile" class="form-control" placeholder="Enter Your Mobile Number......" required="required" size="30">
		   		</div><center>
                  <div class="form-group">
		   			<input class="box" type="checkbox" name="on_number" style="border: 10px solid blue;">
		   			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Show My Mobile Number in Ads.<br>
		   		</div>
                
          
                </center>
  
		   		<br><center>
		   		<button type="submit"  name="submit" class="btn btn-primary" style="padding: 8px; margin-bottom: 10px;"> Submit</button></center>
		   		<?php ?>
              
		   	</form>
		   	</table>
		   	
		   <?php  sellingquery(); ?>

		   </div>	
		   
		</div>
	</div>
	<!--JQuery function select_city-->

	<script type="text/javascript">
		
			function state(state_id){
				$.ajax({
					url:"city.php",
					type:"POST",
					beforeSend: function(){
						$("#city").html("<option> Loading.... </option>");
					},
					data:'state_id='+state_id,
				    success:function(returnvalue){
				    	$("#city").html(returnvalue);
				    	
				    	//alert(returnvalue);
				    }
				});
			}
		
	</script>

 
 <?php  require('include/footer.inc.php');

  }

  ?>
		                                     			
