<?php
include 'include/connection.inc.php';
//include 'include/function2.inc.php';


// Display all user in user.php

function user()
 {
 	include 'include/connection.inc.php';

 	$sql='SELECT * FROM login';
 	$query=mysqli_query($con,$sql) or die('User Query not run');
 	?>
       
      <div class="row" style="margin-left: 30px;">
    	<div class="col-lg-12 col-sm-10 col-md-12">
    		<h2 style="text-align: center;">All User</h2><br>
    		<table class="table">
    			<thead>
    				<tr>
    					<th>Id</th>
    					<th>Name</th>
    					<th>Phone</th>
    					<th>Email</th>
    					<th>Password</th>
    					<th>Status</th>
    					<th>Delete</th>
    				</tr>
    			</thead>

 	<?php
 	while($fetch=mysqli_fetch_array($query))
 	{
 		$user_id=$fetch['u_id'];
 		$user_name=$fetch['name'];
 		$user_mobile=$fetch['mobile'];
 		$user_email=$fetch['email'];
 		$password=$fetch['password'];
 		$user_password=base64_decode($password);
        $status=$fetch['status'];
 		?>
 		
    			<tbody>
    				<tr class="color">
    					<td><?php echo "$user_id"; ?></td>
    					<td><?php echo "$user_name"; ?></td>
    					<td><?php echo "$user_mobile"; ?></td>
    					<td><?php echo "$user_email"; ?></td>
    					<td><?php echo "$user_password"; ?></td>
    					<td>
                            <?php
                             if($status==1){
                                echo "<a href='?type=status&operation=block&id=$user_id' ><button class='btn btn-success'>Block</button></a>";
                             }else{
                                echo "<a href='?type=status&operation=unblock&id=$user_id' ><button class='btn btn-danger'>Unblock</button></a>";

                             }

                            ?>
                        </td>
    					<td><a <?php echo "href=?type=delete&operation=delete&id=$user_id ";?>><button class="btn btn-danger">Delete</button></a></td>
    				</tr>
    			</tbody>
    			<?php 

                  }

    			?>
    		</table>
    	</div>
        </div>
        
 		<?php
        if(isset($_GET['type']) && $_GET['type']!=''){
            $type=$_GET['type'];
            if($type=='status'){
                $operation=$_GET['operation'];
                $id=$_GET['id'];
                if($operation=='block'){
                    $status=0;
                }else{
                    $status=1;
                }
             $block_user_sql="UPDATE login set status=$status where u_id=$id";
             $con->query($block_user_sql) or die('query error');
             if($con){
                header('location:user.php');
             }
            }
        }
        // DELETE USER PHP CODE....

        if(isset($_GET['type']) && $_GET['type']!=''){
            $type=$_GET['type'];
            if($type=='delete'){
                $operation=$_GET['operation'];
                $id=$_GET['id'];
               
             $delete_user_sql="DELETE login where u_id=$id";
             $con->query($delete_user_sql) or die('query error');
             if($con){
                ?>
                <script>  alert('One User is Deleted'); </script>
                <?php
                header('location:user.php');
             }
            }
        }
 	
 } 

 function all_products()
 {
 	include 'include/connection.inc.php';

 	$sql="SELECT * FROM bdata ";
 	$result=$con->query($sql) or die('query error');

 	?>
       <div class="row" style="margin-left: 30px;">
    	<div class="col-lg-12 col-sm-10 col-md-12">
    		<h2 style="text-align: center;">New Product</h2><br>
    		<table class="table">
    			<thead>
    				<tr>
                        <th>S.I</th>
    					<th>B_Id</th>
    					<th>B_cat</th>
                        <th>Seller_id</th>
    					<th>B_name</th>
    					<th>B_price</th>
    					<th>B_P_Date</th>
    					<th>View</th>
                        <th>Status</th>
    					<th>Delete</th>
    				</tr>
    			</thead>

 	<?php
    
    if($result->num_rows > 0)
    {   
        $x=1;
    	while($row=$result->fetch_assoc())
    	{
    		$B_id=$row['B_id'];
    		$B_cat=$row['cat_id'];
    		$B_name=$row['B_name'];
    		$B_price=$row['B_price'];
    		$B_P_Date=$row['date'];
            $status=$row['status'];
            $seller_id=$row['seller_id'];

    	?>
    			<tbody>
    				<tr class="color">
                        <td><?php echo "$x"; ?></td>
    					<td><?php echo "$B_id"; ?></td>
    					<td><?php echo "$B_cat"; ?></td>
                        <td><?php echo "$seller_id"; ?></td>
    					<td><?php echo "$B_name"; ?></td>
    					<td><?php echo "$B_price"; ?></td>
    					<td><?php echo "$B_P_Date"; ?></td>
    					<td><a <?php echo "href=details.php?type=view&operation=details&id=$B_id"; ?>><button class="btn btn-success">View</button></a>
                        </td>
                        <td>
                            <?php
                            if($status==1){
                                echo "<a href ='?type=status&operation=deactive&id=$B_id'><button class='btn btn-success'>Active</button></a>";
                            }else{
                                 echo "<a href ='?type=status&operation=active&id=$B_id'><button class='btn btn-danger'>Deactive</button></a>";
                            }

                            ?>
                        </td>
    					<td><a <?php echo "href=?type=delete&operation=delete&id=$B_id"; ?>><button class="btn btn-danger">Delete</button></a>
                        </td>
    				</tr>	
    			</tbody>
    			<?php
                $x++;
    		}
    			?>
    		</table>
    	</div>
    </div>
</div>
<?php	
}

// PRODUCT ACTIVE DEAVTIVE PHP CODE.....

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
                header("location:product.php");
            }
        }
    }

//PRODUCT DELETE PHP CODE.......

if(isset($_GET['type']) && $_GET['type']!=''){
    $type=$_GET['type'];
    if($type=='delete'){
        $operation=$_GET['operation'];
        $id=$_GET['id'];

        $delete_product_sql="DELETE FROM bdata where B_id=$id";
        $con->query($delete_product_sql) or die('query error');

        if($con){
            echo "<script> alert('Product Delete Succesfully') </script>";
            header("location:product.php");
        }
    }
}
    

} 

 

function view_catagory()
{
	include 'include/function.inc.php';

	$sql="SELECT * FROM  b_cat";

	 $result=$con->query($sql) or die('query error');
	 ?>
	    <div class="row" style="margin-left: 30px;">
    	<div class="col-lg-12 col-sm-10 col-md-12">
    		<h2 style="text-align: center;">Query Email</h2><br>
    		<table class="table">
    			<thead>
    				<tr>
    					<th>S.N</th>
    					<th>Id</th>
    					<th>Catagory</th>
    					<th>Edit</th>
    					<th>Delete</th>
    				</tr>
    			</thead>
	 <?php
	 while($fetch=$result->fetch_assoc())
	 
	 {
	 	$cat_id=$fetch['cat_id'];
	 	$cat_name=$fetch['B_cat'];
         ?>
    			<tbody>
    				<tr class="color">
    					<td><?php $i ?></td>
    					<td><?php echo "$cat_id"; ?></td>
    					<td><?php echo "cat_name"; ?></td>
    					<td><button class="btn btn-success">View</button></td>
    					<td><button class="btn btn-danger">Delete</button></td>
    				</tr>
    			</tbody>
    			<?php
    		}
    			?>
    		</table>
    	</div>
    </div>
</div>

          <?php
	 

}
// VIEW DATA ON DATABASE THROUGH TABLE .....

function get_table_data($table_name,$candition){
    include 'include/connection.inc.php';
 //SELECT * FROM TABLE='TABLE_NAME' WHERE CANDITION='CONDITION'   
    $sql="SELECT * from $table_name";
    $result=$con->query($sql);
    if($result){
        $row=mysqli_num_rows($result);
        if($row!=0){
            $arr=array();
            while($fetch=mysqli_fetch_assoc($result)){
              $arr[]=$fetch;
            }
            return($arr);
        }
    }
}

//GET SAFE INPUT IN DATABASE.....

function get_safe_value($con,$str){
  if($str!=''){
    return mysqli_real_escape_string($con,$str);
  }
}

// PRINT DATA THROUGH PRINT_R()...
function pre($str){
    echo "<pre>";
    print_r($str);
    die();
}


?>