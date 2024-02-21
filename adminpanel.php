<?php
session_start();
if(isset($_SESSION["username"])){
include_once('dbconnect.php');

global $conn;    
$qry = "SELECT * FROM table_pembekal"  ;
$record= $conn->query($qry);
$rC = $record->num_rows;

if($rC>0){
    
    }
    $qry1 = "SELECT * FROM table_products WHERE type = 'Barang'";
    $record1 = $conn->query($qry1);
    $rC1 = $record->num_rows;
    
    
    $qry2 = "SELECT * FROM table_products WHERE type = 'Perkhidmatan'";
    $record2 = $conn->query($qry2);
    $rC2 = $record2->num_rows;
    $all = $rC1 + $rC2;
    
    $qry3 = "SELECT * FROM table_job ";
    $record3 = $conn->query($qry3);
    $rC3 = $record3->num_rows;
    
    $qry4 = "SELECT * FROM training_table ";
    $record4 = $conn->query($qry4);
    $rC4 = $record4->num_rows;
    

       
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
                                <li><a class="dropdown-item" href="managecourses">Kursus latihan</a></li><br>
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
  
   
    



    <div style="height:10vh;padding-top:4vh;padding-left:10px"><h1>Papan utama admin<h1></div>
    <div style="padding:10px">
<div class="row">
  <div class="col">
      <div class="card bg-success p-3 text-center">
    <p>Nombor Pembekal <p>
     <h2 style="color:white">  <?php echo $rC1 ?></h2>
     </div>
  </div>

  <div class="col">
    <div style="    background-color: #eacf20" class="card  p-3 text-center">
    <p>Nombor Perkhidmatan <p>
     <h2>  <?php echo $all ?></h2>
    </div>
  </div>`

  <div class="col">
    <div class="card bg-success p-3 text-center">
    <p>Nombor Kursus latihan <p>
     <h2 style="color:white">  <?php echo $rC4 ?></h2>
     </div>
</div>


<div class="col">
    <div style="background-color: #eacf20" class="card  p-3 text-center">
    <p>Nombor Perkerjaan <p>
     <h2>  <?php echo $rC3 ?></h2>
     </div>
</div>
 </div>




<div style="height:10px"></div>
 

 
     <div class="card" style="padding:15px">
     <table id= "myTable"  class="ui celled table" style="width:100%" >
         <thead id="tdd">
             
         <tr>
             
             <th>ID pembekal</th>
             <th>Nama</th>
             <th>Tarikh dafter</th>
             <th>Status</th>
             <th>email</th>
             <th>Alamat</th>
             
           
         </tr>
         </thead>
          
         <tbody>
        
                  
        <?php 
        
        if($rC>0){
        while($row=$record->fetch_array()){ ?>
             <tr>
                  
                  <td><?php echo $row['userID'] ?></td>
                     <td><?php echo $row['fullname'] ?></td>
                     <td><?php echo $row['date_created'] ?></td>
                     <td><?php echo $row['status'] ?></td>
                     <td><?php echo $row['email'] ?></td>
                     <td><?php echo $row['address'] ?></td>
                   
                    </td>
                     </tr>
         <?php }}?>
         
         
     </tbody>  
      
     </table>
     </div>
     <script>
   $('#myTable').DataTable( {
    responsive: true,
    search:true
} );
</script>
<script language="javascript" type="text/javascript">
    
    document.getElementById('wrap').style.width = document.defaultView.getComputedStyle(document.getElementById('tdd'), "").getPropertyValue("width");
</script>

     
</head>

    
</body>
</html>
