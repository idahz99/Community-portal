<?php
session_start();
include('dbconnect.php');
if(isset($_GET['add']) AND $_GET['add']=='success'){
echo '<script> alert("Perkhidmatan berjaya ditambah ")</script>';
header("location:dashpembekal.php");
}
if(isset($_GET['status']) AND $_GET['status']=='deleted'){
    echo '<script> alert("Perkhidmatan telah dibuang")</script>';
    //header("location:dashpembekal.php");
    }

if(isset($_GET['edit']) AND $_GET['edit']=='success'){
    echo '<script> alert("Kemaskini anda telah dilaksanakan.")</script>';
    //header("location:dashpembekal.php");
    }



$id = $_SESSION["id"];

global $conn;
$qry = "SELECT * FROM table_pembekal WHERE userID = $id";
$record = $conn->query($qry);
$rC = $record->num_rows; 
$rowp = $record->fetch_array();
$_SESSION['name']= $rowp["name"];

$qryp = "SELECT * FROM table_products WHERE id_pembekal = $id" ;
$recordp= $conn->query($qryp);


if($rC>0){
    

$qry1 = "SELECT * FROM table_products WHERE type = 'Barang' AND id_pembekal= $id ";
$record1 = $conn->query($qry1);
$rC1 = $record1->num_rows;


$qry2 = "SELECT * FROM table_products WHERE type = 'Perkhidmatan'AND id_pembekal= $id";
$record2 = $conn->query($qry2);
$rC2 = $record2->num_rows;


$qry3 = "SELECT * FROM table_job WHERE id_pembekal= $id ";
$record3 = $conn->query($qry3);
$rC3 = $record3->num_rows;

$qry4 = "SELECT * FROM training_table WHERE id_pembekal= $id  ";
$record4 = $conn->query($qry4);
$rC4 = $record4->num_rows;


   
}

?>

<!DOCTYPE html>
<html lang="en">
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
    <title>Halaman utama pembekal</title>

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
               <div style="height:10vh;padding-top:4vh;padding-left:10px"><h1>Halaman utama pembekal<h1></div>
                <Div style="display: flex; justify-content: flex-end;padding-right:10px" onclick="window.location.href='Tambahperkhidmatan.php'"><button type="button" class="btn btn-success"><i class="fa-solid fa-plus"></i></button></Div>

                </head>

                
    <div style="padding:10px">
<div class="row">
  <div class="col">
      <div style="background-color:darkgreen" class="card p-3 text-center">
    <p>Nombor Barang <p>
     <h2 style="color:white">  <?php echo $rC1 ?></h2>
     </div>
  </div>

  <div class="col">
    <div style="background-color:#eacf20"  class="card  p-3 text-center">
    <p>Nombor Perkhidmatan <p>
     <h2 style="color:black">  <?php echo $rC2 ?></h2>
    </div>
  </div>`

  <div class="col">
    <div style="background-color:darkgreen" class="card  p-3 text-center">
    <p>Nombor Kursus latihan <p>
     <h2 style="color:white">  <?php echo $rC4 ?></h2>
     </div>
</div>


<div class="col">
    <div style="background-color:#eacf20"  class="card  p-3 text-center">
    <p>Nombor Perkerjaan <p>
     <h2 style="color:black" >  <?php echo $rC3 ?></h2>
     </div>
</div>
 </div>

 <div style="height:15px"></div>
 <div class="card">
<table id= "myTable"  class="ui celled table" style="width:100%" >
         <thead id="tdd">
             
         <tr>
             
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
        while($row=$recordp->fetch_array()){ ?>
             <tr>
                  
                  <td><?php echo $row['product_id']; ?></td>
                     <td><?php echo $row['name']; ?></td>
                     <td><?php echo $row['date_created']; ?></td>
                     <td><?php echo $row['type']; ?></td>                  
                    <td><a href="edit.php?id=<?php echo $row['product_id'];?>"><i class="fa-regular fa-pen-to-square"></i></a>
                   
                    <a style="color:red"href="delete.php?id=<?php echo $row['product_id'];?>" onclick="return confirm('Adakah anda pasti ingin memadam');"><i class="far fa-trash-alt"></i></a>
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

<style>
    #myTable_wrapper{
        margin-top: 15px;
    }
</style>

    
</body>
</html>