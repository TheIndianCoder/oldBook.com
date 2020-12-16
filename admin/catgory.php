<?php  
include('include/header.inc.php');
include 'include/connection.inc.php';
include 'include/function.inc.php';
?>
<!-- UPPER CONTAINER --->
<div class="container">
	<div class="row justify-content">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div>
				<hr>
			      <a href="#">New Product</a>&nbsp;&nbsp;&nbsp; 
			      <a href="#">Old Product</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <button class="btn btn-success" type="button" id="click">Add New</button>
				<hr>
			</div>
		</div>
	</div>
</div>
   
<div class="container">
    <div class="row justify-content">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form class="form-container" id="form" method="post" >
                <div class="form-group">
                    <label class="title">Catagory_Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Add New Catagory">
                </div>
                <button class="btn btn-success btn-block" type="submit" name="n_cat">Add</button>
            </form>
        </div>
    </div>
</div>
<!--- JQUERY SCRIPT -->
<script>
    $(document).ready(function(){
        $("#form").hide();
    });
    

</script>

<script> 
$(document).ready(function(){
    $('#click').click(function(){
        $('#form').toggle();
    });
});
</script> 


<?php
//PHP QUERY FOR INSERT NEW CATAGORY.....

if(isset($_POST['n_cat']))
    {
         
        $new=mysqli_real_escape_string($con,$_POST['name']);
        

       $sql="INSERT INTO b_cat (B_cat) VALUES ('$new') ";

        $result=$con->query($sql) or die('query error');

        if($result)
        {
            ?>
            <script> alert('Thanks for adding new Catagory') </script>
            <?php
        }else
        {
            ?>
            <script>alert('Try Again');</script>
            <?php
        } 
    }

?>

<?php
// PHP QUERY FOR SELECT DATA .....

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
                        <th>Status</th>
    					<th>Delete</th>
    				</tr>
    			</thead>
	 <?php
     $i='';
	 while($fetch=$result->fetch_assoc())
	 
	 {
        $i='1';
	 	$cat_id=$fetch['cat_id'];
	 	$cat_name=$fetch['B_cat'];
        $status=$fetch['status'];
         ?>
    			<tbody>
    				<tr class="color">
    					<td><?php echo "$i"; ?></td>
    					<td><?php echo "$cat_id"; ?></td>
    					<td><?php echo "$cat_name"; ?></td>
    					<td>
    						<a <?php echo "href=add_catagory.php?id=$cat_id"; ?> ><button class="btn btn-success" name="edit">Edit</button></a>
    					</td>
                        <td>
                             <?php
                        if($status==1){
                            echo "<a href ='?type=status&operation=deactive&id=$cat_id'><button class='btn btn-success'>Active</button></a>";

                        }else{
                            echo "<a href ='?type=status&operation=active&id=$cat_id'><button class='btn btn-danger'>Deactive</button></a>";

                        }

                        ?>
                        </td> 
    					<td><a <?php echo "href=?type=delete&operation=delete&id=$cat_id"; ?>>
    						<button class="btn btn-danger">Delete</button></a>
    					</td>
    				</tr>
    			</tbody>
    			<?php
                $i++;
    		}
    			?>
    		</table>
    	</div>
    </div>
</div>
<?php 
// Active Deactive Catagores php code......
if(isset($_GET['type']) && $_GET['type']!=''){

    $type=$_GET['type'];
    if($type=='status'){
        $operation=$_GET['operation'];
        $id=$_GET['id'];
        if($operation=='active'){
              $status='1';
        }else{
              $status='0';
        }

        $update_status=" UPDATE  b_cat set status='$status' where cat_id='$id' ";
        $con->query($update_status) or die('Query error');
        if($con){
            header('location:catgory.php');
        }
    }

}
// DELETE CATAGORY PHP CODE.......

if(isset($_GET['type']) && $_GET['type']!=''){

    $type=$_GET['type'];
    if($type=='delete'){
        $operation=$_GET['operation'];
        $id=$_GET['id'];

        $delete_catagory=" DELETE FROM  b_cat where cat_id='$id' ";
        $con->query($delete_catagory) or die('Query error');
        if($con){
            ?>
            <script> alert('Data is Deleted'); </script>
            <?php
            header('location:catgory.php');
        }
    }

}

?>