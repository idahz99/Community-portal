<?php
session_start();
if(isset($_SESSION["username"])){
include_once('dbconnect.php');
if(isset($_GET['status']) AND $_GET['status']== 'deleted'){
    echo '<script>alert("Perkhidmatan telah dipadam")</script>';
}
global $conn;    
$qry = "SELECT * FROM table_pembekal"  ;
$record= $conn->query($qry);
$rC = $record->num_rows;

if($rC>0){
    
    }
    $qry1 = "SELECT * FROM table_products ";
    $record1 = $conn->query($qry1);
    $rC1 = $record1->num_rows;
          
    }
    ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/15d780a4a3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="includes\navbar.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papan pemuka Admin</title>

    <div id="wrap" class="wrapper" style="display: inline-block; background-color: white; min-width: 100%; box-shadow: 0px -5px 10px 0px rgb(0 0 0 / 50%);">
        <nav class="container" >
     <span style="padding:1%">
                <img id="logo" style="padding-top:1%"src="assets\images\logo.png" alt="ebalinglogo">
    </span>
    <div style="width:30%"></div>
            <ul class="menu">
            <li><a href="adminpanel.php">Papan pemuka Admin</a></li>
               <li><a href="applicant.php">Pemohon</a></li>
                 <li><ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="align-content: center ">
                        <li class="nav-item dropdown" >
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Uruskan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="manageitems.php"> Barang dan Perkhidmatan</a></li><br>
                                <li><a class="dropdown-item" href="managejob.php">Peluang perkerjaan</a></li><br>
                                <li><a class="dropdown-item" href="managecourses.php">Kursus latihan</a></li><br>
                            </ul>
                        </li>
                    </ul>
                    </li>
               
           <li>
            <div style="align-content: center; display:flex;flex-wrap: wrap; ">
   <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="align-content: center ">
                          <li class="nav-item dropdown" >
                              <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="fas fa-user me-2"></i><?php echo $_SESSION["username"] ?>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                              </ul>
                          </li>
                      </ul>
                 
       
    </div>  

</li>
    </ul>
        </nav>
    </div>
    <h1>Mengurus Barang dan Perkhidmatan</h1>
    <div style="height:15px"></div>
 <div class="card">
<table id= "myTable"  class="ui celled table" style="width:100%;table-layout:fixed" >
         <thead id="tdd">
             
         <tr>
             <th>Gambar</th>
             <th>ID</th>
             <th>Nama</th>
             <th>Tarikh ditambah</th>
             <th>Jenis</th>
             <th>  </th>
           
         </tr>
         </thead>
          
         <tbody>
        
                  
        <?php 
        
        if($rC>0){
        while($row=$record1->fetch_array()){ ?>
             <tr>
             <td> <div class="w3-container w3-third"><img class="img" style="cursor:pointer" onclick="onClick(this)" src="assets\images\products\ <?php echo $row['cover_img'] ?>"> </div> </td>
                  <td><?php echo $row['product_id']; ?></td>
                     <td><?php echo $row['name']; ?></td>
                     <td><?php echo $row['date_created']; ?></td>
                     <td><?php echo $row['type']; ?></td>                  
                    <td>               
                    <a style="color:red"href="admindelete.php?id=<?php echo $row['product_id'];?>"><i class="far fa-trash-alt"></i></a>
                    </td>
                     </tr>
         <?php }}?>
         
         
     </tbody>  
      
     </table>
     <div id="modal01" class="w3-modal" onclick="this.style.display='none'">
  <span class="w3-button w3-hover-red w3-xlarge w3-display-topright">&times;</span>
  <div class="w3-modal-content w3-animate-zoom">
    <img id="img01" style="width:100%">
  </div>
</div>
     </div>
     <script>
   $('#myTable').DataTable( {
    responsive: true,
    columnDefs: [
    {
        
        { "title": "center", "targets": "_all" }
    }
  ]

} );
</script>

<style>
    #myTable_wrapper{
        margin-top: 15px;
    }.img{
    float: left;
    width:  100px;
    height: 100px;
    background-size: cover;


}td, th {
  width: auto;
  text-align: center;
}
</style>
<script>
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}
</script>
    
</body>
</html>





