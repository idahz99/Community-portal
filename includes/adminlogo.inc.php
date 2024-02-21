<?php
session_start();
include_once('../dbconnect.php');


if (isset($_POST['username'])){
   $username =  $_POST['username'];
   print_r($username);
   $password = $_POST['password'];
   print_r($password);
   $sql1 = "SELECT * from table_admin WHERE username ='$username' and password = '$password' "; 
   $check = mysqli_query($conn,$sql1); 
   $checkdta = mysqli_num_rows($check); 
   print_r($checkdta);
if($checkdta == 0){ 
   header("location:../adminlogin.php");
}elseif($checkdta == 1){
$_SESSION['username'] = $username;    
header("location:../adminpanel.php");
}
}
?>