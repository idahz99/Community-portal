<?php
session_start();
include('dbconnect.php');
$id = $_GET["id"];
$_SESSION['jobid'] = $id;
global $conn;
$qry = "SELECT * FROM table_job WHERE job_id = $id";
$record = $conn->query($qry);
$rC = $record->num_rows; 
$row = $record->fetch_array();


$idpem = $_SESSION["id"];
$qryp = "SELECT * FROM table_pembekal WHERE userID = $idpem";
$recordp = $conn->query($qryp);
$rowp = $recordp->fetch_array();


?>
   


        <!DOCTYPE html>
        <html lang="en">

        <head>
          <script src="https://kit.fontawesome.com/15d780a4a3.js" crossorigin="anonymous"></script>
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
            crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
          <link href="includes\navbar.css" rel="stylesheet" />


        </head>
        <div id="wrap" class="wrapper" style="display: inline-block; background-color: white; min-width: 100%; box-shadow: 0px -5px 10px 0px rgb(0 0 0 / 50%);">
        <nav class="container" >
     <span style="padding:1%">
                <img id="logo" style="padding-top:1%"src="assets\images\logo.png" alt="ebalinglogo">
    </span>
    <div style="width:30%"></div>
            <ul class="menu">
            <li><a href="dashpembekal.php">Halaman utama Pembekal </a></li>
            <li><a href="Senarailatihan.php">Senarai latihan</a></li>
            <li><a href="Senaraikerja.php">Senarai Perkerjaan</a></li>
             
               
            </ul>
            <div style="align-content: center; display:flex;flex-wrap: wrap; ">
   <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="align-content: center ">
                          <li style="padding-left:10px"  class="nav-item dropdown" >
                              <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="fas fa-user me-2"></i><?php echo $rowp["name"]  ?>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="Tambahperkhidmatan.php">Tambah perkhidmatan</a></li>
                                                   <li><a class="dropdown-item" href="akaun.php">Akaun anda</a></li> 
                                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                              </ul>
                          </li>
                      </ul>
                 
       
    </div>  
        </nav>
    </div>
        <style>
          #upload-container {
            position: relative;
            margin: 0;
            max-width: 200px;
            justify-content: center;
            height: 100%;

          }

          .upload-label {
            display: block;
            font-size: 1.2rem;
            font-weight: 600;
            color: #444;
            cursor: pointer;
            padding: 15px;
            background: #fff;
            border-radius: 5px;
            border: 2px solid #ddd;
            text-align: center;
            height: 100%;
            max-height: 200px;
            width: 100%;
          }

          .upload-label:hover {
            background: #f1f1f1;
            border-color: #c0c0c0;
          }

          #preview {

            display: inline-flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;
            height: 10;

          }

          .upload-preview {
            position: relative;

            width: 100%;
            height: 100%;
            overflow: hidden;
            border-radius: 5px;
            height: 150px;
          }

          .upload-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;

          }

          .delete-icon {
            position: absolute;
            top: 5px;
            right: 5px;
            color: black;
            cursor: pointer;
            font-size: 1.2rem;
          }

          .upload-container {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 500px;
            width: 50vw;
          }

          .row>* {
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding: 0px;



          }

          textarea {
            resize: none;
          }

          #count_message {
            background-color: smoke;
            margin-top: -20px;
            margin-right: 5px;
          }


          .col position-absolute {
            height: 100%;
          }

          #image-upload1,
          #image-upload2,
          #image-upload3 {
            display: none;

          }
        </style>

        <html>

        <body>
        <div style="padding-top: 2%; justify-content:center; padding-bottom: 2%; display:flex;  margin-left:10%; margin-right: 10%; box-shadow: #c0c0c0;">
          
          <div  >
      <form action="includes/editjob.inc.php" method="post">
        <div class="row">
          <h2 style="margin-left: 0;">Ubah butiran perkerjaan</h2>
          <div class="col">
          
            <label class="form-label">Nama perkerjaan</label>
            <input class="form-control" type="text" name="Namakerja" value="<?php echo $row['job_title'] ?>" required>
          </div>
          <div style="width: 5%;"></div>
          <div class="col">
            <label class="form-label">Nama perniagaan</label>
            <input class="form-control" type="text"  name="Namaperniagaan" value="<?php echo $row['company'] ?>" required>
          </div>

          <div style="width: 5%;"></div>
          <div class="col">
            <label class="form-label">Gaji(RM)</label>
            <input class="form-control" type="number"  name="salary" min="0" value="<?php echo $row['salary'] ?>" required></input>
          </div>
        </div>
        <br>
        <div class="mb-3">
          <label class="form-label">Keperluan pekerjaan</label>
          <textarea class="form-control" maxlength="500" rows="3"  name="description"
            required><?php echo $row['requirements'] ?></textarea>
          <span class="pull-right label label-default" id="count_message"></span>
        </div>


        <div class="mb-3">
          <label class="form-label">Alamat</label>
          <textarea class="form-control" maxlength="500" rows="3" id="address" name="alamat"><?php echo $row['address'] ?></textarea>
          <span class="pull-right label label-default" id="count_message"></span>
        </div>

        <div class="row">
          <div class="col">
            <label for="Nama">Lokasi</label>
            <select name="joblocationmenu" style="width: 20vw" class="form-select " required>
              <option value="Bakal">Bakal</option>

              <option value="Baling town" <?php if ($row['location'] == "Baling town")
                    echo "selected"; ?>>Baling town
                  </option>

                  <option value="Bongor" <?php if ($row['location'] == "Bongor")
                    echo "selected"; ?>>Bongor</option>

                  <option value="Kupang" <?php if ($row['location'] == "Kupang")
                    echo "selected"; ?>>Kupang</option>

                  <option value="Pulai" <?php if ($row['location'] == "Pulai")
                    echo "selected"; ?>>Pulai</option>

                  <option value="Siong" <?php if ($row['location'] == "Siong")
                    echo "selected"; ?>>Siong</option>

                  <option value="Tawar" <?php if ($row['location'] == "Tawar")
                    echo "selected"; ?>>Tawar</option>

                  <option value="Teloi Kanan" <?php if ($row['location'] == "Teloi Kanan")
                    echo "selected"; ?>>Teloi Kanan
                  </option>
            </select>
          </div>
          <div class="col">
            <label for="Nama">Jenis kerja</label>
            <select name="jobtype" style="width: 20vw" class="form-select" required>
              <option value="Sepenuh masa" <?php if ($row['location'] == "Sepenuh masa")
                    echo "selected"; ?>>Sepenuh masa</option>

              <option value="Sambilan" <?php if ($row['location'] == "Sambilan")
                    echo "selected"; ?>>Sambilan</option>

              <option value="Intern" <?php if ($row['location'] == "Intern")
                    echo "selected"; ?>>Intern</option>

              <option value="Sementara" <?php if ($row['location'] == "Sementara")
                    echo "selected"; ?>>Sementara</option>

            </select>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label class="form-label">Nombor telefon</label>
            <input class="form-control"style="width: 20vw" type="tel"  name="phone" value="<?php echo $row['phone'] ?>" required>
          </div>

       
          <div class="col">
            <label class="form-label">Email</label>
            <input class="form-control"style="width: 20vw" type="email" name="email" value="<?php echo $row['email'] ?>"></input>
          </div>
             

        </div>
 <div style="height:10px"></div>
        <div>
          <input style="background-color: green;" class="btn btn-primary" type="submit"name="submit" value="Simpan perubahan">
        </div>

</form>
        </div>

    </div>
        </body>
        </html>
     