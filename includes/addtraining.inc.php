<?php
session_start();
include_once('../dbconnect.php');
if(isset($_POST['submit'])){
    $idpembekal = $_SESSION['id']; 
    $id = idgenerator($conn);
   // prepare the SQL statement to insert the new training course
    $stmt = "INSERT INTO training_table (training_title,training_ID,id_pembekal, fee, start_date, end_date, start_time, end_time, link, t_desc, address, phone_no, email, language, state, medium) VALUES ('".$_POST['title']."',".$id.",".$idpembekal.", '".$_POST['fee']."', '".$_POST['stdate']."', '".$_POST['enddate']."', '".$_POST['srttime']."', '".$_POST['endtime']."', '".$_POST['link']."', '".$_POST['description']."', '".$_POST['alamat']."', '".$_POST['phone']."', '".$_POST['email']."', '".$_POST['language']."', '".$_POST['traininglocationmenu']."', '".$_POST['medium']."')";
   
    if($conn->query($stmt)) {
        header("location:../Tambahperkhidmatan.php?add=success");
    } else {
        echo "Error: ";
    }

 }

function idgenerator($conn){
    do {
    $uniqueid = rand(1000,999999);
    $res = $conn->query("SELECT job_id from table_job WHERE EXISTS (SELECT job_id FROM table_job WHERE $uniqueid= job_id )");
    }
    while(mysqli_num_rows($res)>0);  
   
    return $uniqueid;
     }


?>