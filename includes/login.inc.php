<?php
session_start();
include_once('../dbconnect.php');
$email =  $_POST['email'];
$password = $_POST['password'];


      $stmt = "SELECT * from table_pembekal WHERE email ='$email'AND password='$password'";
      
     if($conn->query($stmt)) 
      {  
        $query  = "SELECT * FROM table_pembekal WHERE email = '$email'"; 
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['userID'];
        header("Location: ../homepage.php");
     
      }




?>
