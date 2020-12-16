<?php
include 'include/header.inc.php';
include 'include/function.inc.php';
include 'include/connection.inc.php';

?>
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div>
				<hr>
			      <a href="#">New Product</a>&nbsp;&nbsp;&nbsp; 
			      <a href="#">Old Product</a> 
				<hr>
			</div>
		</div>
	</div>
</div>

<?php 

all_products();

?>