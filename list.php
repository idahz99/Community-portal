<?php
session_start();
if(isset($_SESSION["id"])){
include_once('dbconnect.php');
$id=$_SESSION["id"];

global $conn;    
$qry = "SELECT * FROM table_products WHERE id_pembekal = $id" ;
$record= $conn->query($qry);
$rC = $record->num_rows;

if($rC>0){
    
    }
        
    }
    ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/15d780a4a3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="includes\navbar.css" rel="stylesheet" />
    <title>Document</title>
</head>
<body>
<div id="wrap" class="wrapper" style="display: inline-block; background-color: white; min-width: 100%; box-shadow: 0px -5px 10px 0px rgb(0 0 0 / 50%);">
        <nav class="container" >
     <span style="padding:1%">
                <img id="logo" style="padding-top:1%"src="assets\images\logo.png" alt="ebalinglogo">
    </span>
    <div style="width:30%"></div>
            <ul class="menu">
            <li><a href="dashpembekal.php">Halaman utama Pembekal </a></li>
             
               
            </ul>
            <div style="align-content: center; display:flex;flex-wrap: wrap; ">
   <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="align-content: center ">
                          <li class="nav-item dropdown" >
                              <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="fas fa-user me-2"></i>John Doe
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="Tambahperkhidmatan.php">Tambah perkhidmatan</a></li>
                              <li><a class="dropdown-item" href="list.php">Uruskan perkhidmatan</a></li>
                              
                                  <li><a class="dropdown-item" href="#">Logout</a></li>
                              </ul>
                          </li>
                      </ul>
                 
       
    </div>  
        </nav>
    </div>





    <div class="card">
<table id= "myTable"  class="ui celled table" style="width:100%" >
         <thead id="tdd">
             
         <tr>
             
             <th>ID</th>
             <th>Nama</th>
             <th>Tarikh dafter</th>
             <th>Jenis</th>
             <th>  </th>
           
         </tr>
         </thead>
          
         <tbody>
        
                  
        <?php 
        
        if($rC>0){
        while($row=$record->fetch_array()){ ?>
             <tr>
                  
                  <td><?php echo $row['product_id']; ?></td>
                     <td><?php echo $row['name']; ?></td>
                     <td><?php echo $row['date_created']; ?></td>
                     <td><?php echo $row['type']; ?></td>                  
                    <td><a href="edit.php?id=<?php echo $row['product_id'];?>"><i class="fa-regular fa-pen-to-square"></i></a>
                    </td>
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


     
</head>

    
</body>
</html>