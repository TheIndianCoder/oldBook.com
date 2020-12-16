<?php  
include('include/header.inc.php');
include 'include/connection.inc.php';
include 'include/function.inc.php';
?>

<?php 
 $id=$_GET['id'];

  $sql="SELECT * FROM b_cat WHERE cat_id=$id";
  $result=$con->query($sql) or die('query Error');

?>
<div class="container">
    <div class="row justify-content">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form class="form-container" id="form" method="post" >
<?php 
               while($row=$result->fetch_assoc())
               {
               	$cat_id=$row['cat_id'];
	 	        $cat_name=$row['B_cat']; 
?>
                <div class="form-group">
                    <label class="title">Catagory_Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Add New Catagory" value='<?php echo "$cat_name"; ?>'>
                </div>

                <?php
}
                ?>
                <button class="btn btn-success btn-block" type="submit" name="u_cat">Update</button>
            </form>
        </div>
    </div>
</div>
<?php 
// EDIT CATAGORY PHP CODE....
if(isset($_POST['u_cat']))
{
      $id=$_GET['id'];

      $update=$_POST['name'];

	$sql="UPDATE b_cat SET B_cat = '$update' WHERE cat_id=$id" ;
	$result=$con->query($sql) or die('query error..');

	if($result){
		header('location:catgory.php');
	}else{
		echo "Not Update";
	}

}
?>