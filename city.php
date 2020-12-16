<?php

$con = mysqli_connect('localhost' ,'root');

mysqli_select_db($con, 'bsdatabase');

if(isset($_POST['state_id'])){

	$data=mysqli_real_escape_string($con,$_POST['state_id']);

$q="SELECT * FROM city WHERE state_id= '".$data."'" ;
$run=mysqli_query($con,$q);

while($fetch=mysqli_fetch_array($run)){
	$id = $fetch['city_id'];
	$city=$fetch['city_name'];
?>
<option value='<?php echo"$id"; ?>'><?php echo "$city"; ?></option>
<?php
}
}

?>
