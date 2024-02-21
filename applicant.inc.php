<?php
session_start();
include_once('dbconnect.php');
$action=$_GET["action"];
$id= $_GET["id"];

if(isset($_SESSION["username"])){
  
if($action==="accept"){
    $status = "verified";
    $application = "accepted";
    $stmt = "UPDATE table_pembekal SET status = '$status',application_status= '$application' WHERE userID= '$id' ";
    if ($conn->query($stmt)===TRUE) {
        echo("alert(You have verfified the seller)");
        header("location:applicant.php");
    }



}if ($action==="reject") {
    $application = "rejected";
    $stmt = "UPDATE table_pembekal SET application_status= '$application' WHERE userID= '$id' ";
    if ($conn->query($stmt)===TRUE) {
        echo("alert(You have rejected the seller)");
        header("location:applicant.php");
    }
} 


    }
        




?>