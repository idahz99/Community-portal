<?php 
session_start();
include('dbconnect.php');
$search_query = isset($_GET['search']) ? $_GET['search'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>

</style>


<body>
    <?php 
    include('includes/header.php');
    ?>

    <form method="GET">
    <div class="input-group col-sm-7" style="width:300px; padding:10px" >
       <input class="form-control" type="text" id="search" name="search" placeholder="search" value="<?php echo $search_query ?>">
      <button type="submit" class="btn btn-warning"><i class="fas fa-search  "></i></button></div>
    </form>

    <?php
    global $conn;
    $search_query = mysqli_real_escape_string($conn, $search_query);
    $qry = "SELECT * FROM table_products WHERE name LIKE '%$search_query%' AND type='Perkhidmatan'";
    $record = $conn->query($qry);
    $rC = $record->num_rows;
    ?>

    <div class=wrap-wrapper>
        <div class='wrap'>
            <?php
            if($rC>0){
                while($row=$record->fetch_array()){
            ?>
            <div class="card" style="width: 100%;">
                <img class="card-img-top;" src="assets\images\products\ <?php echo $row['cover_img']; ?>">
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

    <style>
        .wrap {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap:1%;
        }
        .wrap-wrapper {
            display: flex;
            padding-left:5%;
            padding-right:5%;  
            justify-content: center;  
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
}


    </style>

</body>
</html>
