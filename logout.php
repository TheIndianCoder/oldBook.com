<?php 

  session_start();

  if(!isset($_SESSION['u_email'])){
  	header('location:login.php');
  }else{
  	session_destroy();
  	header('location:login.php');
  }

 ?>