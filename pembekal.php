<?php
session_start();
include('dbconnect.php');

if (isset($_GET['id'])) {
    $idpembekal = $_GET['id'];
    $qrypembekal = "SELECT * FROM table_pembekal WHERE userID = $idpembekal";
    $qry = "SELECT * FROM table_products WHERE id_pembekal = $idpembekal";
    $record = $conn->query($qry);
    if ($record->num_rows > 0) {
        $row = $record->fetch_assoc();
  $record = $conn->query($qrypembekal);
    if ($record->num_rows > 0) {
        $rowp = $record->fetch_assoc();}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $rowp['name']; ?></title>
</head>
<body>
    <?php include('includes/header.php'); ?>

    <div style="display:flex; ">  
	<style type="text/css">
		.profile-img {
			width: 150px;
			height: 150px;
			object-fit: cover;
			border-radius: 5%;
            border-style: solid;
            border-color: black;
		}
	</style>
   
<div style="padding-left:100px; padding-top:10px ">
   <div><h4><a style="text-decoration:none; color:black" href="pembekal.php?id= <?php echo $rowp['userID']; ?>"><?php echo $rowp['name']; ?></a><h4>
    <p class="extra"><i class="fas fa-map-marker-alt" style="color: #000000;"> </i><?php echo $rowp['district']; ?></p>
   <div style="display:flex"><img src="assets\images\user\ <?php if(!empty($rowp['prof_pic'])){ echo $rowp['prof_pic'];}else{echo "default.png";} ?>" id="profile-img-preview" class="profile-img"><br>
     <span style="width:5px"></span><p class="extra"><?php echo $rowp['bus_desc']; ?></p>
   </div>


   </div>
   
    <p class="extra"><i class="fas fa-phone" style="color: #000000;"></i> <?php echo $rowp['phone_no']; ?>  <i class="far fa-envelope" style="color: #000000;"></i> <?php echo $rowp['email']; ?></p>
   
    
</div>
<style>
 #perkhidmatan{
    display:none;
  }

  #latihan{
    display: none;
}#kerja{
    display: none;
}.extra{
    font-size: 0.8em;
    font-weight: 100;
    color: grey;
}





</style>



    </div>
    <div >
  <div style="margin: 0" class="row">

<div style="display:flex; justify-content:center"><hr></div>
    
    
     <div style="padding-left:100px; padding-bottom: 5px;">

 <select id="menu" class="form-select" >
  <option selected value="barang">Barang </option>
  <option value="perkhidmatan">Perkhidmatan</option>
  <option value="latihan">Kursus latihan</option>
  <option value="kerja">Jawatan kosong</option>
  
</select>
    </div>
   <div class=container id='barang'>

   <?php
    global $conn;
    //$search_query = mysqli_real_escape_string($conn, $search_query);
    $qryb = "SELECT * FROM table_products WHERE id_pembekal= $idpembekal AND  type='Barang'";
    $recordb = $conn->query($qryb);
    $rCb = $recordb->num_rows;
    ?>
    <div class=wrap-wrapper>
        <div class='wrap'>
            <?php
            if($rCb>0){
                while($row=$recordb->fetch_array()){
            ?>
            <div class="card" style="width: 100%;">
                <img class="card-img-top;"src="assets\images\products\ <?php echo $row['cover_img']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row["name"] ?></h5>
                    <h6>RM: <?php echo $row["price"] ?></h6>
                    <h6>Lokasi: <?php echo $row["location"] ?></h6>
                    <a class="stretched-link" href="view.php?id=<?php echo $row['product_id'];?>"></a>
                </div>
            </div>
            <?php }} else { ?>
            <p>No results found.</p>
            <?php } ?>
        </div>
    </div>
  </div>





   <div class=container id='perkhidmatan'>
   <?php
    global $conn;
    //$search_query = mysqli_real_escape_string($conn, $search_query);
    $qryp = "SELECT * FROM table_products WHERE id_pembekal= $idpembekal AND  type='Perkhidmatan'";
    $recordp = $conn->query($qryp);
    $rCp = $recordp->num_rows;
    ?>

    <div class=wrap-wrapper>
        <div class='wrap'>
            <?php
            if($rCp>0){
                while($row=$recordp->fetch_array()){
            ?>
            <div class="card" style="width: 100%;">
                <img class="card-img-top;"src="assets\images\products\ <?php echo $row['cover_img']; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row["name"] ?></h5>
                    <h6>RM: <?php echo $row["price"] ?></h6>
                    <h6>Lokasi: <?php echo $row["location"] ?></h6>
                    <a class="stretched-link" href="view.php?id=<?php echo $row['product_id'];?>"></a>
                </div>
            </div>
            <?php }} else { ?>
            <p>Tiada perkhidmatan yang ditawarkan oleh pembekal ini.</p>
            <?php } ?>
        </div>
    </div>

  
</div>



   <div class=container id='latihan'>
   <?php
    global $conn;
   // $search_query = mysqli_real_escape_string($conn, $search_query);
    $qry = "SELECT * FROM training_table WHERE id_pembekal=$idpembekal;";
    $record = $conn->query($qry);
    $rC = $record->num_rows;
    ?>

    <div >
        <div >
            <?php
            if($rC>0){
                while($row=$record->fetch_array()){
            ?>
            <div class="card" style="width: 100%;">
                    <div class="card-body">
                    <h1 class="card-title"><?php echo $row["training_title"] ?></h1>
                    <div style="display:flex; justify-content: space-between;"><p style="colour:lightgrey"><?php echo $row["state"]."| ". $row["language"]."|". $row["medium"] ?></p> 
                    <div>
                    <div> <i class="fas fa-calendar-week"></i><?php echo " ". $row["start_date"]."- ". $row["end_date"]?></div>
                    <div> <i class="far fa-clock"></i><?php echo $row["start_time"]."- ". $row["end_time"]?>   </div>
                    </div>
                </div>
                    <h3 >RM: <?php echo $row["fee"] ?></h3>
                    <p><?php echo $row["t_desc"] ?></p>
                    <p><?php echo $row["address"] ?></p>
                    <p><?php echo $row["phone_no"] ?></p>
                    <p><?php echo $row["email"] ?></p>
                    <a style="text-decoration:none" href="<?php echo $row["link"] ?>">Maklumat lanjut </a>

                </div>
            </div>
             <div style="height:10px"></div>

            <?php }} else { ?>
            <p>Tiada kursus latihan yang di tawar oleh pembekal ini.</p>
            <?php } ?>
        </div>
    </div>
            </div>


   <div class=container id='kerja'>
   <?php
    global $conn;
    //$search_query = mysqli_real_escape_string($conn, $search_query);
    $qry = "SELECT * FROM table_job WHERE  id_pembekal=$idpembekal;";
    $record = $conn->query($qry);
    $rC = $record->num_rows;
    ?>

    <div >
        <div >
            <?php
            if($rC>0){
                while($row=$record->fetch_array()){
            ?>
            <div class="card" style="width: 100%;">
                    <div class="card-body">
                    <h1 class="card-title"><?php echo $row["job_title"] ?></h1>
                    <h5><?php echo $row["company"] ?></h5>
                    <div style="display:flex; justify-content: space-between;"><p style="colour:lightgrey"><?php echo $row["location"]."| ". $row["job_type"]?></p> 
                    </div>
                    <h3 >RM: <?php echo $row["salary"] ?></h3>
                    <p><?php echo $row["requirements"] ?></p>
                    
                    <p><?php echo $row["address"] ?></p>
                    </div>
            </div>
             <div style="height:10px"></div>

            <?php }} else { ?>
            <p>Tiada jawatan yang ditawarkan oleh pembekal ini.</p>
            <?php } ?>
        </div>
    </div>
            </div>

    <style>
    .wrap-wrapper{
   width: 80%;
   display: inline-block;
    }  .wrap {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap:1%;
        }
        .wrap-wrapper {
            display: flex;
            padding-left:5%;
            padding-right:5%;    
            justify-content: center;
        }.card{
            width:90%;
            margin-left:5%;
            margin-right:5%;  
        }
        @media screen and (max-width: 1000px) {
            .wrap {
                grid-template-columns: repeat(4, 1fr);
            }
        }
        @media screen and (max-width: 768px) {
            .wrap {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        @media screen and (max-width: 480px) {
            .wrap {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        .html {
            min-width: fit-content
        }img{

        height: 200px;
        object-fit: cover;
        }#menu{
            width:20%;
            padding-bottom: 3px;
        }hr{
            width:90%;
        }
    </style>

 
   
  
    </div>
</div>

<style>
  .product{

   padding:30px;
   padding-right: 40px;
  
  }
</style>
<script>

    const menu = document.getElementById("menu");
    const option1Div = document.getElementById("barang");
    const option2Div = document.getElementById("perkhidmatan");
    const option3Div = document.getElementById("latihan");
    const option4Div = document.getElementById("kerja");


    menu.addEventListener("change", () => {
      if (menu.value === "perkhidmatan") {
        option1Div.style.display = "none";
        option2Div.style.display = "block";
        option3Div.style.display = "none";
        option4Div.style.display = "none";
      }else if(menu.value === "latihan"){
        option1Div.style.display = "none";
        option2Div.style.display = "none";
        option3Div.style.display = "block";
        option4Div.style.display = "none";
      }  else if(menu.value === "kerja"){
        option1Div.style.display = "none";
        option2Div.style.display = "none";
        option3Div.style.display = "none";
        option4Div.style.display = "block";
      }    
      else {
        option1Div.style.display = "block";
        option2Div.style.display = "none";
        option3Div.style.display = "none";
        option4Div.style.display = "none";
      }
    })
</script>




  
</body>
</html>

<?php
    } else {
        echo "Product not found";
    }
} else {
    echo "Product ID not provided";
}
?>