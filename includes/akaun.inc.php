<?php
session_start();
include_once('../dbconnect.php');
//var_dump($_SESSION);
var_dump($_POST);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['id'])) {
    $name = mysqli_real_escape_string($conn,$_POST['Nama']);
    $phone = $_POST['phone'];
    $desc = mysqli_real_escape_string($conn,$_POST['desc']);
    $address = $_POST['address'];
    $location = $_POST['locationmenu'];
    $id = $_SESSION['id'];
    $targetDir = '..\assets\images\user\ ';
    $profile_img = "";

    $qryp = "SELECT * FROM table_pembekal WHERE userID = $id";
    $recordp = $conn->query($qryp);
    $row = $recordp->fetch_array();

    // Check if a new profile pic
    if ($_FILES['profile-pic']['error'] === 0) {
        $fileType = pathinfo($_FILES['profile-pic']['name'], PATHINFO_EXTENSION);
        $newname = md5(rand(1, 1000000) . uniqid(mt_rand(), true));
        $targetFilePath = $targetDir . $newname . "." . $fileType;
        $fileName = $newname . "." . $fileType;
        $old_image_path = $targetDir . $row['prof_pic'];
        unlink($old_image_path);
        move_uploaded_file($_FILES['profile-pic']['tmp_name'], $targetFilePath);
        $profile_img = $fileName;
        
        } else{
        print_r("bruhh");
        $profile_img = $row['prof_pic'];
    }


}
$stmt = "UPDATE table_pembekal SET name='$name', phone_no='$phone', bus_desc='$desc', address='$address', district='$location', prof_pic='$profile_img' WHERE userID='$id'";
    if ($conn->query($stmt)) {
        print($stmt);
      header("location:../akaun.php?edit=success");
    }