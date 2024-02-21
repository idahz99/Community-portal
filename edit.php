<?php
session_start();
include('dbconnect.php');
$id = $_GET["id"];
$_SESSION['productid'] = $id;
//print($_SESSION["id"]);
global $conn;
$qry = "SELECT * FROM table_products WHERE product_id = $id";
$record = $conn->query($qry);
$rC = $record->num_rows; ?>
<div class=wrap-wrapper>
  <div class='wrap'>
    <?php
    if ($rC > 0) {
      while ($row = $record->fetch_array()) {

        ?>


        <!DOCTYPE html>
        <html lang="en">

        <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                          <li style="padding-left:10px" class="nav-item dropdown" >
                              <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i  class="fas fa-user me-2"></i><?php echo $_SESSION["name"]  ?>
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

          #jobform {
            display: none;

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
          <h2 style="margin-left: 10%;">Ubah perkhidmatan</h2>
          <div
            style="padding-top: 2%; padding-bottom: 2%; display:flex; flex-direction: column; margin-left:10%; margin-right: 10%; box-shadow: #c0c0c0;">
            <label for="Nama">Jenis perkhidmatan</label>
            <select name="type" style="width: 20vw" class="form-select" id="menu" form="uploadForm" required>
              <option value="Barang" <?php if ($row['type'] == "Barang")
                echo "selected"; ?>> Barang </option>

              <option value="Perkhidmatan" <?php if ($row['type'] == "perkhidmatan")
                echo "selected"; ?>> Perkhidmatan
              </option>



            </select>
            <br>
            <div id='default'>
              <form id="uploadForm" action="includes/edit.inc.php" method="post" enctype="multipart/form-data">

                <div class="row">
                  <div class="col">
                    <label class="form-label">Nama perkhidmatan</label>
                    <input class="form-control" type="text" id="name" name="Namaperkhidmatan"
                      value="<?php echo $row['name'] ?>" required>
                  </div>
                  <div style="width: 5%;"></div>
                  <div class="col">
                    <label class="form-label">Harga(RM)</label>
                    <input class="form-control" type="number" id="price" name="price" min="0"
                      value="<?php echo $row['price'] ?>" required>
                  </div>
                </div>
                <br>
                <div class="mb-3">
                  <label class="form-label">Penerangan perkhidmatan</label>
                  <textarea class="form-control" maxlength="500" rows="3" id="description" name="desc"
                    required><?php echo $row['product_des'] ?></textarea>
                  <span class="pull-right label label-default" id="count_message"></span>
                </div>
                <div class="mb-3">
                  <label class="form-label">Alamat</label>
                  <textarea class="form-control" maxlength="500" rows="3" id="alamat" name="address"
                  required><?php echo $row['address'] ?></textarea>
                  </div>
                <label for="Nama">Lokasi</label>
                <select name="locationmenu" style="width: 20vw" class="form-select " option
                  value="<?php echo $row['location'] ?>" required>
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

                <div style="display:flex; height: 150px; justify-content: space-around; margin-bottom:5%">

                  <div class="row position-relative" id="upload-container">
                    <label for="image-upload1" class="upload-label">
                      <i class="fas fa-cloud-upload-alt"></i> Gambar muka depan
                    </label>
                        <input name="img1" type="hidden" value="true">
                    <input type="file" name="images1" id="image-upload1" accept=".jpg,.jpeg,.png" required
                      onchange="previewImages('image-upload1','preview1')" />
                    <div class="col position-absolute" id="preview1">
                      <div id="temp" class="upload-preview">
                        <button id="delete1" type="button" style="background-color: transparent; border:none"
                          class='fas fa-times-circle delete-icon' ; onclick="removepic('temp','img1')"> </button>
                          <input style="height:100%; width:100%; object-fit:cover" type="image" name="preview1"
                          onerror="hide('delete1','preview1','temp')"
                          src="assets\images\products\ <?php echo $row['cover_img']; ?>">
                          
                      </div>
                   
                    </div>
                  </div>

                  <div class="row position-relative" id="upload-container">
                    <label for="image-upload2" class="upload-label">
                      <i class="fas fa-cloud-upload-alt"></i> Gambar tambahan
                    </label>
                        <input name="img2" type="hidden" value="true">
                    <input type="file" name="images2" id="image-upload2" accept=".jpg,.jpeg,.png"
                      onchange="previewImages('image-upload2','preview2')" />
                    <div class="col position-absolute" id="preview2">
                      <div id="temp2" class="upload-preview">
                        <button id="delete2" type="button" style="background-color: transparent; border:none"
                          class='fas fa-times-circle delete-icon' ; onclick="removepic('temp2','img2')"> </button>
                        <input type="image" style="height:100%; width:100%; object-fit:cover" name="preview2"
                          onerror="hide('delete2','preview2','temp2')" src="assets\images\products\ <?php if (isset($row['add_img'])) {
                            echo $row['add_img'];
                          } ?>">
                        
                      </div>
                    </div>
                  </div>

                  <div class="row position-relative" id="upload-container">
                    <label for="image-upload3" class="upload-label">
                      <i class="fas fa-cloud-upload-alt"></i> Gambar tambahan
                    </label>
                        <input name="img3" type="hidden" value="true">
                    <input type="file" name="images3" id="image-upload3" accept=".jpg,.jpeg,.png"
                      onchange="previewImages('image-upload3','preview3')" />
                    <div class="col position-absolute" id="preview3">
                      <div id="temp3" class="upload-preview">
                        <button id="delete3" type="button" style="background-color: transparent; border:none"
                          class='fas fa-times-circle delete-icon' ; onclick="removepic('temp3','img3')"> </button>
                        <input type="image" style="height:100%; width:100%; object-fit:cover" name="preview3"
                          onerror="hide('delete3','preview3','temp3')" src="assets\images\products\ <?php if (isset($row['add_img2'])) {
                            echo $row['add_img2'];
                          } ?>">
                        
                      </div>
                    </div>
                  </div>
                </div>

                <div>

                  <button onclick="checkcover()" type="button" style="background-color: green;" class="btn btn-primary"
                    name="edit">Simpan perubahan</button>

                </div>
              </form>
            </div>


          </div>

        <?php }
    } ?>
      <script>
        function previewImages(varid, varpre) {

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
                var myfile = document.getElementById(varid);
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
        function removepic(temp,name) {
          var value = temp;
          var img = name;
          console.log(img);
          var temp = document.getElementById(value);
          temp.remove();
          console.log(document.getElementsByName('preview1'));
          document.getElementsByName(img)[0].value = "false";
       

        }
      </script>
      <script>
        function hide(button, img, value) {
          console.log("test")
          var temp = document.getElementById(value);
          var myButton = document.getElementById(button);
          var myImage = document.getElementsByName(img)[0];
          myButton.style.display = 'none';
          temp.style.display = 'none';
          myImage.style.display = 'none';

          if (img === "preview2") {
            document.getElementsByName("img2")[0].value = "false";
            console.log(document.getElementsByName("img2")[0].value);
          } if (img === "preview3") {
            document.getElementsByName("img3")[0].value = "false";

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
        function checkcover() {
          var coverImage = "";
          var fileInput = document.getElementById('image-upload1');
          try {
            coverImage = document.getElementsByName('preview1').length;
          } catch {
            coverImage = false;
          }

          console.log(coverImage);
          console.log(fileInput.files.length);
          if (fileInput.files.length === 0 && coverImage === 0) {
           // alert("Please upload a cover picture");
          } else if (coverImage === 1) {
           // alert("The picture did not change");
            document.getElementById("uploadForm").submit();
          }
          else if (fileInput.files.length != 0 && coverImage == false) {
            //alert("Removed old picture and uploaded new one");
            document.getElementById("uploadForm").submit();
          }

        }
      </script>


  </div>
  </body>

  </html>