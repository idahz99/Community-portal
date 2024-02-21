<?php
session_start();
include_once('../dbconnect.php');
$name = $_POST['Nama'];
$email= $_POST['email'];
$id = idgenerator($conn);
$password = $_POST['password'];


      $sql1 = "SELECT * from table_pembekal WHERE email ='$email'";
      // print("Value given is "." ".$google_id);
      $check = mysqli_query($conn,$sql1);       
      $checkdta = mysqli_num_rows($check);

     if($checkdta == 0) 
      { // New user Insertion  
         print("Value given isss "." ".$google_id);
        $querynew = "INSERT INTO table_pembekal (userID,name,email,status) VALUES ('$id','$name','$email','unverified')";
        print("Value given isss "." ".$querynew);
        mysqli_query($conn,$querynew);
        $_SESSION['status'] = 'unverified';
        $_SESSION['id'] = $id;
        header("Location:../homepage.php");
     
      }
      elseif($checkdta == 1) 
      { // Returned user data update         
         $query  = "SELECT * FROM table_pembekal WHERE email = '$email'"; 
         $result = $conn->query($query);
         $row = $result->fetch_assoc();
         $_SESSION['id'] = $row['userID'];
         header("Location: ../homepage.php");
           
            
         
      ; }



 function idgenerator($conn){
 do {
 $uniqueid = rand(1000,999999);
 $res = $conn->query("SELECT userID from table_pembekal WHERE EXISTS (SELECT userID FROM table_pembekal WHERE $uniqueid= userID )");
 }
 while(mysqli_num_rows($res)>0);  

 return $uniqueid;
  }

?>
