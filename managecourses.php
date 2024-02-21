<?php
session_start();
if(isset($_SESSION["username"])){
include_once('dbconnect.php');
if(isset($_GET['status']) AND $_GET['status']== 'deleted'){
    echo'<script>alert("Kursus telah dipadam")</script>';
}
global $conn;    
$qry = "SELECT * FROM table_pembekal"  ;
$record= $conn->query($qry);
$rC = $record->num_rows;

if($rC>0){
    
    }
    $qry1 = "SELECT * FROM  training_table ";
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
        </nav>
</li>
</ul>


    </div>
    <h1>Mengurus Kurus Latihan</h1>
    <div style="height:15px"></div>
 <div class="card">
<table id= "myTable"  class="ui celled table" style="width:100%" >
         <thead id="tdd">
             
         <tr>
             
         <th>ID</th>
             <th>Nama Kursus</th>
             <th>Tarikh ditambah </th>
             <th>Harga</th>
             <th>Lokasi</th>
             <th>  </th>
           
         </tr>
         </thead>
          
         <tbody>
        
                  
        <?php 
        
        if($rC>0){
        while($row=$record1->fetch_array()){ ?>
             <tr>
                  
             <td><?php echo $row['training_ID']; ?></td>
                     <td><?php echo $row['training_title']; ?></td>
                     <td><?php echo $row['date_created']; ?></td>
                     <td><?php echo $row['fee']; ?></td> 
                     <td><?php echo $row['state']; ?></td>                                       
                    <td> <a style="color:red"href="admindelete.php?id=<?php echo $row['training_ID'];?>"><i class="far fa-trash-alt"></i></a></td>
                     </tr>
         <?php }}?>
         
         
     </tbody>  
      
     </table>
     </div>
     <script>
   $('#myTable').DataTable( {
    responsive: true
} );
</script>

<style>
    #myTable_wrapper{
        margin-top: 15px;
    }
</style>

    
</body>
</html>