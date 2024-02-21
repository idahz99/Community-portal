<?php
session_start();
include('dbconnect.php');
if(isset($_GET["add"]) and $_GET['add']=="success"){
  echo '<script>alert("Tambahan perkhidmatan berjaya")</script>';

}
$id = $_SESSION["id"];
global $conn;
$qry = "SELECT * FROM table_pembekal WHERE userID = $id";
$record = $conn->query($qry);
$rC = $record->num_rows;
$row = $record->fetch_array(); 

$qryp = "SELECT * FROM table_pembekal WHERE userID = $id";
$recordp = $conn->query($qryp);
$rCp = $recordp->num_rows; 
$rowp = $recordp->fetch_array();


?>



<!DOCTYPE html>
<html lang="en">


<style>
  #upload-container {
    position: relative;
    margin: 0;
    max-width: 200px;
    justify-content: center;
    height:100;

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
    height:150px;
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
  }#trainingform{
    display:none;
  }

  #jobform {
    display: none;

  }.col position-absolute{
    height:100%;
  }#image-upload1,#image-upload2,#image-upload3{
  height:0;

  }
</style>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/15d780a4a3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="includes\navbar.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah perkhidmatan</title>

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
                          <li style="padding-left:10px" class="nav-item dropdown" >
                              <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i  class="fas fa-user me-2"></i><?php echo $rowp["name"]  ?>
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
                

                </head>

<body>
  <h2 style="margin-left: 10%;">Tambah perkhidmatan</h2>
  <div
    style="padding-top: 2%; padding-bottom: 2%; display:flex; flex-direction: column; margin-left:10%; margin-right: 10%; box-shadow: #c0c0c0;">
    <label for="Nama">Jenis perkhidmatan</label>
    <select name="type" style="width: 20vw" class="form-select" id="menu" form="uploadForm" required>
      <option value="Barang">Barang</option>

      <option value="Perkhidmatan">Perkhidmatan</option>
      <option value="Peluang perkerjaan">Peluang perkerjaan</option>
      <option value="Kursus latihan">Kursus latihan</option>

    </select>
    <br>
    <div id='default'>
      <form id="uploadForm" action="includes/addservice.inc.php" method="post" enctype="multipart/form-data">

        <div class="row">
          <div class="col">
            <label class="form-label">Nama perkhidmatan</label>
            <input class="form-control" type="text" id="name" name="Namaperkhidmatan" required>
          </div>
          <div style="width: 5%;"></div>
          <div class="col">
            <label class="form-label">Harga(RM)</label>
            <input class="form-control" type="number" id="price" name="price" min="0" required></input>
          </div>
        </div>
        <br>
        <div class="mb-3">
          <label class="form-label">Penerangan perkhidmatan</label>
          <textarea class="form-control" maxlength="500" rows="3" id="description" name="desc"
            required></textarea>
          <span class="pull-right label label-default" id="count_message"></span>
        </div>
        <div class="mb-3">
          <label class="form-label">Alamat</label>
          <textarea class="form-control" maxlength="500" rows="3" id="alamat" name="address" required></textarea>
          <span class="pull-right label label-default" id="count_message"></span>
        </div>
        <label for="Nama">Lokasi</label>
            <select name="locationmenu" style="width: 20vw" class="form-select " required>
              <option value="Bakal">Bakal</option>

              <option value="Baling town">Baling town</option>

              <option value="Bongor">Bongor</option>

              <option value="Kupang">Kupang</option>

              <option value="Pulai">Pulai</option>

              <option value="Siong">Siong</option>

              <option value="Tawar">Tawar</option>

              <option value="Teloi Kanan">Teloi Kanan</option>
            </select>
        <div style="display:flex; height: 150px; justify-content: space-around; margin-bottom:5%">
          
        <div class="row position-relative" id="upload-container">
            <label for="image-upload1" class="upload-label">
              <i class="fas fa-cloud-upload-alt"></i> Gambar muka depan
            </label>

            <input  type="file" name="images1" id="image-upload1" required
              onchange="previewImages('image-upload1','preview1')" accept=".jpg,.jpeg,.png"  />
            <div class="col position-absolute" id="preview1" >
            </div>
          </div>

          <div class="row position-relative" id="upload-container">
            <label for="image-upload2" class="upload-label">
              <i class="fas fa-cloud-upload-alt"></i>Gambar tambahan
            </label>

            <input type="file" name="images2" id="image-upload2" onchange="previewImages('image-upload2','preview2')" accept=".jpg,.jpeg,.png"  />
            <div class="col position-absolute" id="preview2"  >
            </div>
          </div>

          <div class="row position-relative" id="upload-container">
            <label for="image-upload3" class="upload-label">
              <i class="fas fa-cloud-upload-alt"></i> Gambar tambahan
            </label>

            <input type="file" name="images3" id="image-upload3" onchange="previewImages('image-upload3','preview3')" accept=".jpg,.jpeg,.png" />
            <div class="col position-absolute" id="preview3">
            </div>
          </div>
        </div>
        <div>
          <input style="background-color: green;" class="btn btn-primary" type="submit" name="submit" value="Hantar">
        </div>
      


      </form>
    </div>

    <div id='jobform' class="container">
      <form action="includes/addjob.inc.php" method="post">
        <div class="row">
          <div class="col">
            <label class="form-label">Nama perkerjaan</label>
            <input class="form-control" type="text" name="Namakerja" required>
          </div>
          <div style="width: 5%;"></div>
          <div class="col">
            <label class="form-label">Nama perniagaan</label>
            <input class="form-control" type="text"  name="Namaperniagaan" required>
          </div>

          <div style="width: 5%;"></div>
          <div class="col">
            <label class="form-label">Gaji(RM)</label>
            <input class="form-control" type="number"  name="salary" min="0" required></input>
          </div>
        </div>
        <br>
        <div class="mb-3">
          <label class="form-label">Keperluan pekerjaan</label>
          <textarea class="form-control" maxlength="500" rows="3" name="description"
            required></textarea>
          <span class="pull-right label label-default" id="count_message"></span>
        </div>


        <div class="mb-3">
          <label class="form-label">Alamat</label>
          <textarea class="form-control" maxlength="500" rows="3" id="address" name="alamat"></textarea>
          <span class="pull-right label label-default" id="count_message"></span>
        </div>

        <div class="row">
          <div class="col">
            <label for="Nama">Lokasi</label>
            <select name="joblocationmenu" style="width: 20vw" class="form-select " required>
              <option value="Bakal">Bakal</option>

              <option value="Baling town">Baling town</option>

              <option value="Bongor">Bongor</option>

              <option value="Kupang">Kupang</option>

              <option value="Pulai">Pulai</option>

              <option value="Siong">Siong</option>

              <option value="Tawar">Tawar</option>

              <option value="Teloi Kanan">Teloi kanan</option>
            </select>
          </div>
          <div class="col">
            <label for="Nama">Jenis kerja</label>
            <select name="jobtype" style="width: 20vw" class="form-select" required>
              <option value="Sepenuh masa">Sepenuh masa</option>

              <option value="Sambilan">Sambilan</option>

              <option value="Intern">Intern</option>

              <option value="Sementara">Sementara</option>

            </select>
          </div>
        
        </div>
 <div class="row">
          <div class="col">
            <label class="form-label">Nombor telefon</label>
            <input class="form-control"style="width: 20vw" type="tel"  name="phone" required>
          </div>

       
          <div class="col">
            <label class="form-label">Email</label>
            <input class="form-control"style="width: 20vw" type="email" name="email"></input>
          </div>
             

        </div>





<div style="height:5px"></div>
        <div>
          <input style="background-color: green;" class="btn btn-primary" type="submit"name="submit" value="Hantar">
        </div>

</form>

    </div>
  <!--For training-->

  <div id='trainingform' class="container">
      <form action="includes/addtraining.inc.php" method="post">
        <div class="row">
          <div class="col">
            <label class="form-label">Tajuk kursus</label>
            <input class="form-control" type="text"  name="title" required>
          </div>

                 <div style="width: 5%;"></div>
          <div class="col">
            <label class="form-label">Bayaran(RM)</label>
            <input class="form-control" type="number" name="fee" step="any"  min="0" required></input>
          </div>
        </div>
        <br>
    
        <div class="row">
          <div class="col">
            <label class="form-label">Tarikh mula</label>
            <input class="form-control" type="date"  name="stdate" required>
          </div>

                 <div style="width: 5%;"></div>
          <div class="col">
            <label class="form-label">Tarikh tamat</label>
            <input class="form-control" type="date" name="enddate"   required></input>
          </div>
        </div>
        <br>

        <div class="row">
          <div class="col">
            <label class="form-label">Masa mula</label>
            <input class="form-control" type="time"  name="srttime" required>
          </div>

                 <div style="width: 5%;"></div>
          <div class="col">
            <label class="form-label">Masa tamat</label>
            <input class="form-control" name= "endtime" type="time"  required></input>
          </div>
        </div>
        <br>


        <div class="mb-3">
          <label class="form-label">Pautan ke laman web anda jika ada</label>
          <input class="form-control"  name="link"
            ></input>
          <span class="pull-right label label-default" id="count_message"></span>
        </div>  

        <div class="mb-3">
          <label class="form-label">Penerangan kursus</label>
          <textarea class="form-control" maxlength="500" rows="3" id="description" name="description"
            required></textarea>
          <span class="pull-right label label-default" id="count_message"></span>
        </div>      

        <div class="mb-3">
          <label class="form-label">Alamat</label>
          <textarea class="form-control" maxlength="500" rows="3" id="address" name="alamat"></textarea>
          <span class="pull-right label label-default" id="count_message"></span>
        </div>

        <div class="row">
          <div class="col">
            <label class="form-label">Nombor telefon</label>
            <input class="form-control" type="tel"  name="phone" required>
          </div>

                 <div style="width: 5%;"></div>
          <div class="col">
            <label class="form-label">Email</label>
            <input class="form-control" type="email" name="email"></input>
          </div>
         
          <div style="width: 5%;"></div>
          <div class="col">
            <label class="form-label">Bahasa</label>
            <input class="form-control" type="text" name="language"   required></input>
          </div>

        </div>
        <br>

        <div class="row">
          <div class="col">
            <label for="Nama">Lokasi</label>
            <select name="traininglocationmenu" style="width: 20vw" class="form-select " required>
              <option value="Bakal">Bakal</option>

              <option value="Baling town">Baling town</option>

              <option value="Bongor">Bongor</option>

              <option value="Kupang">Kupang</option>

              <option value="Pulai">Pulai</option>

              <option value="Siong">Siong</option>

              <option value="Tawar">Tawar</option>

              <option value="Teloi Kanan">Teloi kanan</option>
            </select>
          </div>
          <div class="col">
            <label for="Nama">Saluran</label>
            <select name="medium" style="width: 20vw" class="form-select" required>
              <option value="Atas talian">Atas talian</option>

              <option value="Bersemuka">Bersemeuka</option>

           


            </select>
          </div>
        </div>

        <div>
          <input style="background-color: green;" class="btn btn-primary" type="submit"name="submit" value="Hantar">
        </div>
    <form>
  </div>

  <script>
    function previewImages(varid, varpre) {

      //alert(varid + ' ' + varpre);
      if (varid === "image-upload1" && varpre === "preview1") {
        var preview = document.querySelector('#preview1');
        preview.innerHTML = "";
        var files = document.querySelector('#image-upload1').files;

      } else if (varid === "image-upload2" && varpre === "preview2") {
        var preview = document.querySelector('#preview2');
        preview.innerHTML = "";
        var files = document.querySelector('#image-upload2').files;

      } else if (varid === "image-upload3" && varpre === "preview3") {
        var preview = document.querySelector('#preview3');
        preview.innerHTML = "";
        var files = document.querySelector('#image-upload3').files;
      }


      if (files.length === 1) {

       
        var reader = new FileReader();

        reader.onloadend = function () {
          var div = document.createElement('div');
          div.className = "upload-preview";
          var img = document.createElement('img');
          img.src = reader.result;
          div.appendChild(img);

          var btn = document.createElement('i');
          btn.className = 'fas fa-times-circle delete-icon';
          btn.onclick = function () {
            this.parentNode.parentNode.removeChild(div);
            document.getElementById(varid).value = "";
            var myfile  = document.getElementById(varid);
                console.log(myfile.files);
                myfile.value = "";
          };
          div.appendChild(btn);

          preview.appendChild(div);
        }

        if (files[0]) {
          reader.readAsDataURL(files[0]);
        }
      }
    }

  </script>
  <script>
    var text_max = 500;
    $('#count_message').html('0 / ' + text_max);
    $('#description').keyup(function () {
      var text_length = $('#description').val().length;
      var text_remaining = text_max - text_length;

      $('#count_message').html(text_length + ' / ' + text_max);
    });

  </script>

  <script>
    const menu = document.getElementById("menu");
    const option1Div = document.getElementById("default");
    const option2Div = document.getElementById("jobform");
    const option3Div = document.getElementById("trainingform");


    menu.addEventListener("change", () => {
      if (menu.value === "Peluang perkerjaan") {
        option1Div.style.display = "none";
        option2Div.style.display = "block";
        option3Div.style.display = "none";
      }else if(menu.value === "Kursus latihan"){
        option1Div.style.display = "none";
        option2Div.style.display = "none";
        option3Div.style.display = "block";
      }      
      else {
        option1Div.style.display = "block";
        option2Div.style.display = "none";
        option3Div.style.display = "none";
      }
    });
  </script>
<script>




</script>



  </div>
</body>

</html>