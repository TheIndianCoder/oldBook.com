<?php 
include 'include/header.inc.php';
include 'include/connection.inc.php';
include 'include/function.inc.php';
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
<!--- Call user function -->
<?php
 user();
/*
$result=get_table_data('login','');

if(isset($result['0'])){

	foreach ($result as $list) {
		$id=$list['u_id'];
        $name=$list['name'];
        $mobile=$list['mobile'];
        $email=$list['email'];
        $password=$list['password'];
		//echo "<pre>";
		echo "$id <br>$name <br>$mobile <br>$email <br>$password <br>" ;



    }
}
*/

?>