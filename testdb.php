<?php
 error_reporting(E_ALL); ini_set('display_errors', TRUE); 
$con = mysqli_connect("103.21.58.5:3306","flingal","Flingal@123$","p101");



// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }else{
  	var_dump($con) ;
  }