<?php
session_start();
include_once('../dbconnect.php');

if (isset($_POST['submit']) and isset($_SESSION['id'])){

$idpembekal = $_SESSION['id']; 

$type = $_POST['jobtype'];    
$name =$_POST['Namakerja'];
$company = $_POST['Namaperniagaan'];
$company = mysqli_real_escape_string($conn, $company);
$gaji = $_POST['salary'];
$description= $_POST['description'];
$description = mysqli_real_escape_string($conn, $description);
$alamat =$_POST['alamat'];
$location = $_POST['joblocationmenu'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$id = idgenerator($conn);
$stmt ="INSERT INTO table_job (job_id,job_title,id_pembekal,company,salary,job_type,requirements,location,address,phone,email) VALUES ('$id','$name','$idpembekal','$company','$gaji','$type','$description','$location','$alamat','$phone','$email')";

if($conn->query($stmt)===TRUE){
    $_SESSION['id'] = $idpembekal;
    print_r('bho');
    header("location:../Senaraikerja.php?add=success");
 
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