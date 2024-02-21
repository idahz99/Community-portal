<?php
session_start();
include_once('../dbconnect.php');
//var_dump($_SESSION);
var_dump($_POST);
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['productid'])) {
    $idproduct = $_SESSION['productid'];
    $type = $_POST['type'];
    $name = $_POST['Namaperkhidmatan'];
    $price = $_POST['price'];
    $description = $_POST['desc'];
    $alamat = $_POST['address'];
    $location = $_POST['locationmenu'];
    $id = $_SESSION['id'];
    $targetDir = '..\assets\images\products\ ';
    $qry = "SELECT * FROM table_products WHERE product_id = $idproduct";
    $record = $conn->query($qry);
    $rC = $record->num_rows;
    $row = $record->fetch_array();
    $add_img = "";
    $add_img2 = "";

    // Check if a new cover image has been uploaded
    if ($_FILES['images1']['error'] === 0) {
        $fileType = pathinfo($_FILES['images1']['name'], PATHINFO_EXTENSION);
        $newname = md5(rand(1, 1000000) . uniqid(mt_rand(), true));
        $targetFilePath = $targetDir . $newname . "." . $fileType;
        $fileName = $newname . "." . $fileType;
        $old_cover_image_path = $targetDir . $row['cover_img'];
        unlink($old_cover_image_path);
        move_uploaded_file($_FILES['images1']['tmp_name'], $targetFilePath);
        $cover_img = $fileName;
        print($cover_img);
    } else if ($_POST["img1"] === "true") {
        print_r("bruhh");
        $cover_img = $row['cover_img'];
    }

    if (!($_FILES['images2']['error'] === 0) and ($_POST["img2"] === "false")) {
        //if database image is there the the picture did not change from the one in database
        print($row['add_img']);
        if (isset($row['add_img']) and !(empty($row['add_img']))) {
            $old_cover_image_path2 = $targetDir . $row['add_img'];
            unlink($old_cover_image_path2);
        }
    } else if (($_FILES['images2']['error'] === 0) and ($_POST["img2"] === "false")) {
        //if its not set that means user deleted it and maybe replaced it with another image so move code to test that here.
        $fileType2 = pathinfo($_FILES['images2']['name'], PATHINFO_EXTENSION);
        $newname2 = md5(rand(1, 1000000) . uniqid(mt_rand(), true));
        $targetFilePath2 = $targetDir . $newname2 . "." . $fileType2;
        $fileName2 = $newname2 . "." . $fileType2;
        
        if (isset($row['add_img']) and !(empty($row['add_img']))) {
            $old_cover_image_path2 = $targetDir . $row['add_img'];
            unlink($old_cover_image_path2);
        }
        move_uploaded_file($_FILES['images2']['tmp_name'], $targetFilePath2);
        $add_img = $fileName2;
    } else if ($_POST["img2"] === "true") {
        $add_img = $row['add_img'];
    }


    if (!($_FILES['images3']['error'] === 0) and ($_POST["img3"] === "false")) {
        //if database image is there the the picture did not change from the one in database
        if (isset($row['add_img2']) and !(empty($row['add_img2']))) {
            $old_cover_image_path3 = $targetDir . $row['add_img2'];
            unlink($old_cover_image_path3);
        }
    } else if (($_FILES['images3']['error'] === 0) and ($_POST["img3"] === "false")) {
        //if its not set that means user deleted it and maybe replaced it with another image so move code to test that here.
        $fileType3 = pathinfo($_FILES['images3']['name'], PATHINFO_EXTENSION);
        $newname3 = md5(rand(1, 1000000) . uniqid(mt_rand(), true));
        $targetFilePath3 = $targetDir . $newname3 . "." . $fileType3;
        $fileName3 = $newname3 . "." . $fileType3;
        if (isset($row['add_img2']) and !(empty($row['add_img2']))) {
            $old_cover_image_path3 = $targetDir . $row['add_img2'];
            unlink($old_cover_image_path3);
        }
        move_uploaded_file($_FILES['images3']['tmp_name'], $targetFilePath3);
        $add_img2 = $fileName3;
    } else if ($_POST["img3"] === "true") {
        $add_img2 = $row['add_img2'];
    }
    print($cover_img);
    $stmt = "UPDATE table_products SET name='$name', price='$price', type='$type', product_des='$description', location='$location', cover_img='$cover_img', add_img='$add_img', add_img2='$add_img2', address='$alamat' WHERE product_id='$idproduct'";
    if ($conn->query($stmt)) {
        print($stmt);
        header("location:../dashpembekal.php?edit=success");

    }
    ;

}