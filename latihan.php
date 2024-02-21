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
  <div style="display:flex;justify-content:center">
    <?php
    global $conn;
    $search_query = mysqli_real_escape_string($conn, $search_query);
    $qry = "SELECT * FROM training_table WHERE training_title LIKE '%{$search_query}%' OR language LIKE '%{$search_query}%' OR state LIKE '%{$search_query}%';";
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
            <p>No results found.</p>
            <?php } ?>
        </div>
    </div>
            </div>

    <style>
    .wrap-wrapper{
   width: 80%;
   display: inline-block;
   

    }
    </style>

</body>
</html>
