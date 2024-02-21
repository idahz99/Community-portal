<?php
session_start();
include_once('../dbconnect.php');

if (isset($_POST['submit']) and isset($_SESSION['id'])) {

   $idpembekal = $_SESSION['id'];
   $type = $_POST['type'];
   $name = $_POST['Namaperkhidmatan'];
   $price = $_POST['price'];
   $description = $_POST['desc'];
   $alamat = $_POST['address'];
   $location = $_POST['locationmenu'];
   $id = idgenerator($conn);

   $targetDir = '..\assets\images\products\ ';
   $fileType = pathinfo($_FILES['images1']['name'], PATHINFO_EXTENSION);
   $newname = md5(rand(1, 1000000) . uniqid(mt_rand(), true));
   $targetFilePath = $targetDir . $newname . "." . $fileType;
   $fileName = $newname . "." . $fileType;
   print($_FILES['images1']['error']);
   print($_FILES['images2']['error']);
   print($_FILES['images3']['error']);

   if (($_FILES['images2']['error'] === '0') and ($_FILES['images3']['error'] === '0')) {
      print("1");
      $fileType2 = pathinfo($_FILES['images2']['name'], PATHINFO_EXTENSION);
      $newname2 = md5(rand(1, 1000000) . uniqid(mt_rand(), true));
      $targetFilePath2 = $targetDir . $newname2 . "." . $fileType2;
      $fileName2 = $newname2 . "." . $fileType2;

      $fileType3 = pathinfo($_FILES['images3']['name'], PATHINFO_EXTENSION);
      $newname3 = md5(rand(1, 1000000) . uniqid(mt_rand(), true));
      $targetFilePath3 = $targetDir . $newname3 . "." . $fileType3;
      $fileName3 = $newname3 . "." . $fileType3;
      move_uploaded_file($_FILES['images1']['tmp_name'], $targetFilePath);
      move_uploaded_file($_FILES['images2']['tmp_name'], $targetFilePath2);
      move_uploaded_file($_FILES['images3']['tmp_name'], $targetFilePath3);
      $stmt = "INSERT INTO table_products (product_id, id_pembekal, name, price, type, product_des, location, cover_img, add_img, add_img2, address)VALUES ('$id', '$idpembekal','$name','$price','$type','$description','$location','$fileName','$fileName2','$fileName3','$alamat')";

   } else {
      if (($_FILES['images2']['error'] == '0') and ($_FILES['images3']['error'] != '0')) {
         print("2");
         $fileType2 = pathinfo($_FILES['images2']['name'], PATHINFO_EXTENSION);
         $newname2 = md5(rand(1, 1000000) . uniqid(mt_rand(), true));
         $targetFilePath2 = $targetDir . $newname2 . "." . $fileType2;
         $fileName2 = $newname2 . "." . $fileType2;
         move_uploaded_file($_FILES['images1']['tmp_name'], $targetFilePath);
         move_uploaded_file($_FILES['images2']['tmp_name'], $targetFilePath2);
         print_r($fileName);
         print_r($fileName2);
         $stmt = "INSERT INTO table_products (product_id, id_pembekal,name, price, type, product_des, location, cover_img, add_img, address)VALUES ('$id', '$idpembekal','$name','$price','$type','$description','$location','$fileName','$fileName2','$alamat')";
      } else if (($_FILES['images2']['error'] !== '0') and ($_FILES['images3']['error'] == '0')) {
         print("3");
         $fileType3 = pathinfo($_FILES['images3']['name'], PATHINFO_EXTENSION);
         $newname3 = md5(rand(1, 1000000) . uniqid(mt_rand(), true));
         $targetFilePath3 = $targetDir . $newname3 . "." . $fileType3;
         $fileName3 = $newname3 . "." . $fileType3;
         move_uploaded_file($_FILES['images1']['tmp_name'], $targetFilePath);
         move_uploaded_file($_FILES['images3']['tmp_name'], $targetFilePath2);
         $stmt = "INSERT INTO table_products (product_id, id_pembekal,name, price, type, product_des, location, cover_img, add_img2, address)VALUES ('$id', '$idpembekal','$name','$price','$type','$description','$location','$fileName','$fileName3','$alamat')";
      } else if (($_FILES['images2']['error'] != '0') and ($_FILES['images3']['error']) != '0') {
         print("yo");
         move_uploaded_file($_FILES['images1']['tmp_name'], $targetFilePath);
         $stmt = "INSERT INTO table_products (product_id, id_pembekal,name, price, type, product_des, location, cover_img, address)VALUES ('$id', '$idpembekal','$name','$price','$type','$description','$location','$fileName','$alamat')";
      }
   }

   if ($conn->query($stmt) === TRUE) {
      $_SESSION['id'] = $idpembekal;
      print_r($stmt);
      header("location:../dashpembekal.php?add=success");

   } else {
      print_r('Error faced, please try again');
   }



}

function idgenerator($conn)
{
   do {
      $uniqueid = rand(1000, 999999);
      $res = $conn->query("SELECT product_id from table_products WHERE EXISTS (SELECT product_id FROM table_products WHERE $uniqueid= product_id )");
   }
   while (mysqli_num_rows($res) > 0);

   return $uniqueid;
}


?>