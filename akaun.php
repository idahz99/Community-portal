<?php
session_start();
include('dbconnect.php');
$id = $_SESSION["id"];

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
  textarea {
    resize: none;
  }

  #count_message {
    background-color: smoke;
    margin-top: -20px;
    margin-right: 5px;
  }.inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}#labelb{
	position: relative;
		display: inline-block;
		overflow: hidden;
		font-size: 1rem;
		font-weight: 400;
		color: #fff;
		background-color: orange;
		border-color: #333;
		border-radius: 0.25rem;
		cursor: pointer;
		width: 100px;
		text-align: center;
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
    <title>Akaun</title>

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
                                  <li><a class="dropdown-item" href="logout.php">Log keluar</a></li>
                              </ul>
                          </li>
                      </ul>
                 
       
    </div>  
        </nav>
    </div>
	<style type="text/css">
		.profile-img {
			width: 150px;
			height: 150px;
			object-fit: cover;
			border-radius: 50%;
		}body{
			background-color:#f4f4f4;
			}#account-form{
        width:90%;
      }
	</style>
</head>
<body>

	<h1 style="padding-left:10px">Akaun anda</h1>
	
		<div style="display:flex; justify-content:center">
	<div style="display:flex; justify-content:space-around; background-color:white; width:90%;border-radius:0.25rem" >
	<form id="account-form" action="includes/akaun.inc.php" method="post" enctype="multipart/form-data">
  <div class="row">
  <div class="col">
	<div><p style="color:grey"> Nombor pembekal <?php echo $rowp["userID"] ?><p></div>
     <div style="display: flex;width: 150px;justify-content: center;flex-direction: column;">
		<img src="assets\images\user\ <?php if(!empty($rowp['prof_pic'])){ echo $rowp['prof_pic'];}else{echo "default.png";} ?>" id="profile-img-preview" class="profile-img"><br>
	     <label style="align-self: center;" class="choose-file" id="labelb" for="profile-pic">Gambar</label>
        <input type="file" id="profile-pic" name="profile-pic" accept=".jpg,.jpeg,.png" class="inputfile" ><br><br>
         </div>
        <div><p style="color:grey"> Menyertai pada: <?php echo $rowp["date_created"] ?><p></div>
        
    </div>
          <div class="col-8">
            <p style="color:grey">Semua maklumat ini akan disediakan kepada orang awam.<p>
            <label class="form-label">Nama</label>
            <input class="form-control" type="text" id="name" name="Nama" value ="<?php echo $rowp["name"] ?>" required>
         
          <div style="width: 5%;"></div>
           <label class="form-label">Telefon Nombor</label>
            <input class="form-control" type="phone" id="price" name="phone" value= "<?php echo $rowp["phone_no"] ?>" ></input>
          
       
        <br>
        <div class="mb-3">
          <label class="form-label">Penerangan perniagaan anda</label>
          <textarea class="form-control" maxlength="500" rows="3" id="description" name="desc"><?php echo $rowp["bus_desc"] ?></textarea>
          <span class="pull-right label label-default" id="count_message"></span>
        </div>
        <div class="mb-3">
          <label class="form-label">Alamat perniagaan</label>
          <textarea class="form-control" maxlength="500" rows="3" id="description" name="address"><?php echo $rowp["address"] ?></textarea>
          <span class="pull-right label label-default" id="count_message"></span>
        </div>
 
        <label >Mukim</label>
        <select name="locationmenu" style="width: 20vw" class="form-select " option
                  value="<?php echo $rowp['district'] ?>" required>
                  <option value="Bakal">Bakal</option>

                  <option value="Baling town" <?php if ($rowp['district'] == "Baling town")
                    echo "selected"; ?>>Baling town
                  </option>

                  <option value="Bongor" <?php if ($rowp['district'] == "Bongor")
                    echo "selected"; ?>>Bongor</option>

                  <option value="Kupang" <?php if ($rowp['district'] == "Kupang")
                    echo "selected"; ?>>Kupang</option>

                  <option value="Pulai" <?php if ($rowp['district'] == "Pulai")
                    echo "selected"; ?>>Pulai</option>

                  <option value="Siong" <?php if ($rowp['district'] == "Siong")
                    echo "selected"; ?>>Siong</option>

                  <option value="Tawar" <?php if ($rowp['district'] == "Tawar")
                    echo "selected"; ?>>Tawar</option>

                  <option value="Teloi Kanan" <?php if ($rowp['district'] == "Teloi Kanan")
                    echo "selected"; ?>>Teloi Kanan
                  </option>
                </select>
         <div style="height:10px"></div>
		

         <button onclick="confirmform()" type="button" style="background-color: green;" class="btn btn-primary"
                    name="edit">Simpan perubahan</button>
    </div>
	</form>
	</div>
	</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			// Show profile picture preview
			$('#profile-pic').on('change', function() {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#profile-img-preview').attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
			});


		});

    function confirmform(){
      if (confirm("Adakah pasti anda nak simpan perubahan") == true) {
        document.getElementById("account-form").submit();
} else {
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
</body>
</html>
