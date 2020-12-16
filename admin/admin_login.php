<?php
include 'include/connection.inc.php';
include 'include/function.inc.php';
include 'include/header.inc.php';
?>

<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div>
				<hr>
			      <a href="#">New User</a>&nbsp;&nbsp;&nbsp; 
			      <a href="#">Old User</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			      <a href="#">Add User</a>&nbsp;&nbsp;&nbsp;
			      <a href="#">User Query</a>&nbsp;&nbsp;&nbsp;
			      
				<hr>
			</div>
		</div>
	</div>
</div>
<?php

// GET TABLE DATA THROUGH FUNCTION LINE_NO-282
$result=get_table_data('admin_login','');




?>

<div class="row" style="margin-left: 30px;">
    	<div class="col-lg-12 col-sm-10 col-md-12">
    		<h2 style="text-align: center;">Admin</h2><br>
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
    if(isset($result['0'])){

	foreach ($result as $list) {
		$id=$list['id'];
        $name=$list['admin_name'];
        $mobile=$list['admin_email'];
        $email=$list['admin_mobile'];
        $password=$list['admin_password'];
        $status=$list['status'];
		
    ?>
    			<tbody>
    				<tr class="color">
    					<td><?php echo "$id"; ?></td>
    					<td><?php echo "$name"; ?></td>
    					<td><?php echo "$mobile";  ?></td>
    					<td><?php echo "$email";  ?></td>
    					<td><?php echo "$password";  ?></td>
    					<td>
                            <?php
                            if($status==1){
                            	echo "<a href='?type=status&operation=block&id=$id' ><button class='btn btn-success'>Block</button></a>";
                            }else{
                            	echo "<a href='?type=status&operation=unblock&id=$id' ><button class='btn btn-danger'>Unblock</button></a>";
                            }

                            ?>
                        </td>
    					<td><a ><button class="btn btn-danger">Delete</button></a></td>
    				</tr>
    			</tbody>
    			<?php 
                  
    }
}
    			?>
    		</table>
    	</div>
        </div>
<?php

if(isset($_GET['type']) && $_GET['type']!=''){
	
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='block'){
            $status=0;
        }else{
            $status=1;
        }
		$admin_status_sql="UPDATE admin_login set status=$status where id=$id";
		$con->query($admin_status_sql) or die('query error');
		if($con){
			header('location:admin_login.php');
		}
	}
}





?>
