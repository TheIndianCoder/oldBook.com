<?php 
@session_start();
require('include/connection.inc.php');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>OBE.com || sell old book on OldBookExchange|| </title>
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	 <link rel="stylesheet" type="text/css" href="css/style.css">
	 <link rel="shortcut icon" type="image" href="image/logo.png">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.4.6/tailwind.min.css">
       
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inttial-scale=1.0" >
	<meta name="description" content="">
	<meta name="keywords" content="">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
</head>
<body  >
	<!---HEADER START ---->
	<nav class="navbar navbar-expand-md navbar-dark bg-dark ">
		<div class="container">
		<a class="navbar-brand" href="#">
			<img class="d-inline-block align-top" src="image/logo.png" width="170" height="50" style="margin-left: 0px;">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="search-container" >
			<form class="form-inline " method="get" action="search.php">
				<input class="form-control-mr-sm-2" id="search" type="search" name="query" placeholder="Search"enctype="multipart/form-data" style="padding: 5px ">
				<button class="btn btn-primary" type="submit" name="submit" style="margin-left: 8px">Search</button>
			</form>	
		</div>	
		<div class="collapse navbar-collapse text-center" id="collapsenavbar">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link text-white" style="padding: 15px;" href="index.php">Home</a>
			</li>
			<?php 

                 
            if(isset($_SESSION['u_email'])){

            ?>
            <li class="nav-item">
				<a class="nav-link text-white" style="padding: 15px;" href="logout.php">Logout</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" style="padding: 15px;" href="u_account.php">MyProfile</a>
			</li>
            <?php	
             }else{

             	?>
            <li class="nav-item">
				<a class="nav-link text-white" style="padding: 15px;" href="login.php">Login</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" style="padding: 15px;" href="registration.php">New User</a>
			</li>
            <?php 
             }

             ?>
			
			<li class="nav-item">
				<a class="nav-link text-white" style="padding: 15px;" href="sell.php">Sell</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" style="padding: 15px;" href="about.php">About Us</a>
			</li>
		</ul>	
		</div>
			&nbsp;

				
	</div>
</nav>

	
<!---HEADER AREA END -->
<!-- MOBILE MENU START--->