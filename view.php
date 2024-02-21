<?php
session_start();
include('dbconnect.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $qry = "SELECT * FROM table_products WHERE product_id = $id";
  $record = $conn->query($qry);
  if ($record->num_rows > 0) {
    $row = $record->fetch_assoc();
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>
        <?php echo $row['name']; ?>
      </title>
    </head>

    <body>
      <?php include('includes/header.php'); ?>

      <div>
        <div class="row" style="padding-top:30px">
          <div style="" class="col-5">

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                  aria-current="true" aria-label="Slide 1"></button>
                <?php if (!empty($row['add_img'])) { ?>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                  <?php
                }
                ?>
                <?php if (!empty($row['add_img2'])) { ?>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
                  <?php
                }
                ?>
              </div>

              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="assets\images\products\ <?php echo $row['cover_img']; ?>"
                    alt="First slide">
                </div>
                <?php if (!empty($row['add_img'])) { ?>

                  <div class="carousel-item">
                    <img class="d-block w-100" src="assets\images\products\ <?php echo $row['add_img']; ?>"
                      alt="Second slide">
                  </div>
                  <?php
                }
                ?>


                <?php if (!empty($row['add_img2'])) { ?>

                  <div class="carousel-item">
                    <img class="d-block w-100" src="assets\images\products\ <?php echo $row['add_img2']; ?>"
                      alt="Third slide">
                  </div>
                  <?php
                }
                ?>


              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>



            <?php
            $idpembekal = $row['id_pembekal'];
            $qry = "SELECT * FROM table_pembekal WHERE userID = $idpembekal";
            $record = $conn->query($qry);
            if ($record->num_rows > 0) {
              $rowp = $record->fetch_assoc();
            }


            ?>
            <div style="padding-left:100px; padding-top:10px ">
              <h6>Maklumat Pembekal<h6>
                  <a style="text-decoration:none;color:darkslategrey " href="pembekal.php?id= <?php echo $rowp['userID']; ?>"><?php echo $rowp['name']; ?></a>
            </div>

          </div>
          <div style="" class="col">
            <div class="product">
              <h2>
                <?php echo $row['name']; ?>
              </h2>
              <div style="height:10px"></div>
              <h4>RM
                <?php echo $row['price']; ?>
              </h4>
              <hr>
              <h6>Penerangan barang</h6>
              <div>
              <p>
                <?php echo $row['product_des']; ?>
              </p>
              </div>
              <div style="height:50px"></div>
              <hr>
              <h6>Lokasi:
                <?php echo $row['location']; ?>
              </h6>
              <p>
                <?php echo $row['address']; ?>
              </p>

            </div>
          </div>
        </div>
      </div>
      <style>
        .product {

          padding: 30px;
          padding-right: 40px;

        }.d-block{
          width: auto;
  height: 400px;
  max-height: 400px;
  object-fit: contain;
        }.carousel-control-next-icon, .carousel-control-prev-icon{
    background-color: black;
    border-radius: 50%;
    height: 50px;
    width: 50px;
}
      </style>







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