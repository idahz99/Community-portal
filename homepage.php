<?php
session_start();
printf($_SESSION['id']);
include_once('dbconnect.php');
if (isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    echo($id);
    $stmt = "SELECT * from table_pembekal WHERE userID ='$id' ";

    $result = $conn->query($stmt);
    $c=$result->num_rows;
    printf($c);
    printf("hi");
    
  if($result->num_rows === 1){
    while($row = $result->fetch_assoc()) {
      if(($row["status"] == 'unverified') && ($row["application_status"] == 'applied')){
        header("Location:applied.php"); 
      }
        elseif($row["status"] == 'unverified'){
          header("Location:sellerverify.php"); 
        }
        elseif($row["status"] == 'verified'){
          header("Location:dashpembekal.php");
            
      }
  
  } 

}
}




?>