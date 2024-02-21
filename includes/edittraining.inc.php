<?php
session_start();
include_once('../dbconnect.php');
$id = $_SESSION['trainingid'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $fee = $_POST['fee'];
  $stdate = $_POST['stdate'];
  $enddate = $_POST['enddate'];
  $srttime = $_POST['srttime'];
  $endtime = $_POST['endtime'];
  $link = $_POST['link'];
  $description = $_POST['description'];
  $alamat = $_POST['alamat'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $language = $_POST['language'];
  $traininglocationmenu = $_POST['traininglocationmenu'];
  $medium= $_POST['medium'];
  
  $sql = "UPDATE training_table SET training_title='$title', fee='$fee', start_date='$stdate ', end_date='$enddate', start_time='$srttime', end_time='$endtime', link='$link', t_desc='$description', address='$alamat', phone_no='$phone', email='$email', language='$language', medium=' $medium', state='$traininglocationmenu' WHERE training_id='$id'";
    
    
    
    if ($conn->query($sql) === TRUE) {
       header("location:../Senarailatihan.php?edit=success");
    } else {
        echo "Error updating record: ";
    }
}
?>