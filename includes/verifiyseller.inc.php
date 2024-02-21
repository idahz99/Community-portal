<?php
session_start();
include_once('../dbconnect.php');



if (isset($_POST['submitver'])){

   $idapp = $_SESSION['id'];
   $sql1 = "SELECT * from table_pembekal WHERE userID ='$idapp'"; 
   $check = mysqli_query($conn,$sql1); 
   $checkdta = mysqli_num_rows($check); 
   print_r('hi');
   print_r($idapp);
   print_r($checkdta);

   if($checkdta == 1){  
$name =$_POST['Nama'];
$id = $_POST['nomid'];
$dob= $_POST['bdate'];
$alamat =$_POST['alamat'];
$idtype = $_POST['idtype'];
$imdid = $_FILES['idmg']['name'];
$imgsel = $_FILES['selfieimg']['name'];
$targetDir = '..\assets\images\user\ ';

$fileName = basename($_FILES['idmg']['name']);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

$fileName2 = basename($_FILES['selfieimg']['name']);
$targetFilePath2 = $targetDir . $fileName2;
$fileType2 = pathinfo($targetFilePath2,PATHINFO_EXTENSION);

if(!isset($imdid, $imgsel)){
echo "image does not exsit";
}else{
   if(move_uploaded_file($_FILES['idmg']['tmp_name'], $targetFilePath) and (move_uploaded_file($_FILES["selfieimg"]["tmp_name"], $targetFilePath2) )){
   
   $status = 'applied';
   $stmt = "UPDATE table_pembekal SET idtype = '$idtype',application_status= '$status',fullname= '$name', self_picture = '$fileName2', id_picture= '$fileName',idnumber= '$id', dob= '$dob', address= '$alamat' WHERE userID= '$idapp' ";
}
}

if($conn->query($stmt)===TRUE){
   $_SESSION['id'] = $idapp;
   header("location:../homepage.php");

}
}}else{
header("location:../Register.php");

}
?>