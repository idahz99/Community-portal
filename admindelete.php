<?php
session_start();
include('dbconnect.php');

$id = $_GET["id"];
$qryjob = "SELECT * FROM table_job WHERE job_id= $id";
$resultjob=$conn->query($qryjob);
$jobcount = $resultjob->num_rows;
$targetDir = '..\assets\images\products\ ';
$qryproduct = "SELECT * FROM table_products WHERE product_id= $id";
$resultproduct=$conn->query($qryproduct);
$productcount = $resultproduct->num_rows;

$qrytrain = "SELECT * FROM training_table WHERE training_ID= $id";
$resulttraining=$conn->query($qrytrain);
$resultt = $resulttraining->num_rows;

if($jobcount> 0){
    $deletejob = "DELETE  FROM table_job WHERE job_id= $id";
    if($conn->query($deletejob)){
       header("location:managejob.php?status=deleted");
      
    }
}else if($productcount>0){
     $qry = "SELECT * FROM table_products WHERE product_id = $id";
    $record = $conn->query($qry);
    $row = $record->fetch_array();
    
     if(!empty($row['cover_img'])){
        $old_image_path = $targetDir . $row['cover_img'];
        unlink($old_image_path);
     }if (!empty($row['add_img'])){
        $old_image_path2 = $targetDir . $row['add_img'];
        unlink($old_image_path2);
    }if (!empty($row['add_img2'])){
        $old_image_path3 = $targetDir . $row['add_img2'];
        unlink($old_image_path3);
    }
    $deleteproduct = "DELETE  FROM table_products WHERE product_id= $id";
        if($conn->query($deleteproduct)){
        header("location:manageitems.php?status=deleted");
     
    }

}else if($resultt>0){
       $deletetrain = "DELETE  FROM training_table WHERE training_ID= $id";
    if($conn->query($deletetrain)){
        header("location:managecourses.php?status=deleted");
 
    }
}








?>