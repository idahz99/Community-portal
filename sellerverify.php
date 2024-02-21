<?php
session_start();
include('dbconnect.php');

$id = $_SESSION["id"];
global $conn;
$qry = "SELECT * FROM table_pembekal WHERE userID = $id";
$record = $conn->query($qry);
$rC = $record->num_rows;
$row = $record->fetch_array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://kit.fontawesome.com/15d780a4a3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="includes\navbar.css" rel="stylesheet" />
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idenity verification</title>
</head>
<body >


<style>
  #verifybtn{
    background-color:#ffd61f;
    width: 150px;
    padding: 14px 20px;
    margin: 2px 0;
    border-radius: 4px;
    cursor: pointer;
    border:none;

  }#wrap-con{
    padding: 40px;
    background-color: white;
    width: fit-content;
    overflow: auto;
  }body{
   
  }.container-sm{
    height: 300px;
    width: 300px
  }#idimg{
    height: 60%;
    width: 100%;
  }#selimg{
    height:60%;
  }
    </style>

<div id="wrap" class="wrapper" style="display: inline-block; background-color: white; min-width: 100%; box-shadow: 0px -5px 10px 0px rgb(0 0 0 / 50%);">
        <nav class="container" >
     <span style="padding:1%">
                <img id="logo" style="padding-top:1%"src="assets\images\logo.png" alt="ebalinglogo">
    </span>
  
            <div style="align-content: center; display:flex;flex-wrap: wrap; ">
   <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="align-content: center ">
                          <li class="nav-item dropdown" >
                              <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="fas fa-user me-2"></i><?php echo $row['name'] ?>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <li><a class="dropdown-item" href="logout.php">Log keluar</a></li>
                              </ul>
                          </li>
                      </ul>
                 
       
    </div>  
        </nav>
    </div>
    <div style="height:15px"></div>
   <div style="display:flex; justify-content:center">
    <div id="wrap-con"style="padding:40px">
    <p >Selamat datang ke E-bidang. Untuk mula menyediakan perkhidmatan, sila sahkan identiti anda dengan memuat naik maklumat di bawah.</p>
    <h5>1. Maklumat peribadi</h5>
      <div class="container-md">
    <form enctype="multipart/form-data" class="form" id='vform' action="includes/verifiyseller.inc.php" method="post">     
        
    <div class="row mb-3">
    <label for="namep" class="col-sm-2 col-form-label">Nama penuh</label>
    <div class="col-sm-10">
      <input type="text" name="Nama" class="form-control" id="namap" required>
    </div>
  </div>

        <div class="row mb-3">
    <label for="nIDp" class="col-sm-2 col-form-label">Nombor ID</label>
    <div class="col-sm-10">
      <input type="number" name="nomid" class="form-control" id="nIDp" required>
    </div>
  </div>

  <div class="row mb-3">
    <label for="tarikhp" class="col-sm-2 col-form-label">Tarikh lahir</label>
    <div class="col-sm-10">
      <input type="date" name="bdate" class="form-control" id="tarikhp" required>
    </div>
  </div> 
   
  <div class="row mb-3">
    <label for="alamatp" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" name=alamat class="form-control" id=alamatp  required>
    </div>
  </div> 
          

      <h5>2.Pengesahan ID</h5>
        
      <label for="Nama">Jenis ID</label>
      <select name="idtype" id="idt" form="vform" style="width: 20vw" class="form-select " >
      <option value="mykad" style="width: 20vw" class="form-select " >MyKad</option>
     
      <option value="lesen" style="width: 20vw" class="form-select " >Lesen</option>

      <option value="pasport" style="width: 20vw" class="form-select " >Pasport</option>

      </select>

    <p>Sila naik muat gamabr Mykad, Lesen, atau Pasport anda.</p>
    <h6>Sila pastikan gambar yang dihantar adalah jelas.<h6>

   <div class=container style="display: inline-flex;">
    <div class="container-sm">
      <img class="img-thumbnail" id="idimg" src="assets\images\idimg.png" >
      <p>Muat turun gambar pengenalan diri</p>
     <div class="mb-3">
  <label for="idmg" class="form-label"></label>
  <input class="form-control" type="file" name="idmg">
</div>
    </div>

    <div class="container-sm">
      <img class="img-thumbnail" id="selimg" src="assets\images\selfie.png" >
      <p>Muat turun gambar muka anda.</p>
      <div class="mb-3">
  <label for="selfieimg" class="form-label"></label>
  <input class="form-control" type="file" name="selfieimg">
    </div>


    
    </div>
   </div>   
          
  <input id="verifybtn"  type="submit" name = "submitver" />

  </form>
    </div>
    </div>
</div>

</body>
</html>