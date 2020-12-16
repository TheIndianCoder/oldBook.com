<?php
require('include/header.inc.php');
require('include/connection.inc.php');

if(isset($_GET['id']))
{
	$report_id=$_GET['id'];

	$sql="INSERT INTO repot (repoted_id) VALUES ('$report_id')";

	$run=mysqli_query($con,$sql) or die('query error');

	if($run)
	{
		?>
		<center>
			<a<?php echo " href='details.php?type=back&id=$report_id'"?>>
		      <button class="btn btn-success" style="padding: 10px; margin-top: 10px;">Back</button>
		    </a>  
		      <h3 style="color: red;">Thanks For Reporting.......</h3>
		</center>
		<?php

		//header('location:echo"details.php?id=$report_id"');
	}
    
     
}






//
?>