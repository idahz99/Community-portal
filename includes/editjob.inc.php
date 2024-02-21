<?php
session_start();
include_once('../dbconnect.php');
$id = $_SESSION['jobid'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jobTitle = $_POST["Namakerja"];
    $company = mysqli_real_escape_string($conn, $_POST["Namaperniagaan"]);
    $salary = $_POST["salary"];
    $jobReq = $_POST["description"];
    $jobLocation = $_POST["joblocationmenu"];
    $type = $_POST['jobtype'];    
    $alamat =$_POST['alamat'];
    $phone =mysqli_real_escape_string($conn,( $_POST['phone']));
    $email = $_POST['email'];
    

    
    $sql = "UPDATE table_job SET job_title = '$jobTitle', company = '$company', salary = '$salary', phone='$phone', `email`='$email', requirements = '$jobReq', job_type = '$type', address='$alamat', location = '$jobLocation' WHERE job_id = '$id'";
         if ($conn->query($sql) === TRUE) {
       header("location:../Senaraikerja.php?edit=success");
    } else {
        echo "Error updating record: ";
    }
}
?>
