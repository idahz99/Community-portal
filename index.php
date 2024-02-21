<?php 
include('dbconnect.php');
$stmt = "SELECT COUNT(*) as count, type FROM table_products GROUP BY type";
$sql = "SELECT location,COUNT(*) as num_services FROM table_products GROUP BY location";
$resultkawasan = $conn->query($sql);
$result=$conn->query($stmt);

$datakawasan = array();
$data = array();
while($row = mysqli_fetch_assoc($result)){
    $data[] = array('label' => $row['type'], 'value' => $row['count']);
};

while ($row = mysqli_fetch_assoc($resultkawasan)) {
    $datakawasan[] = array(
        "state" => $row['location'],"num_products" => $row['num_services']
    );
}

$datak_json = json_encode($datakawasan);

$data_json = json_encode($data);

$qry = "SELECT * FROM table_products WHERE type = 'Barang'";
$record = $conn->query($qry);
$rC = $record->num_rows;


$qry2 = "SELECT * FROM table_products WHERE type = 'Perkhidmatan'";
$record2 = $conn->query($qry2);
$rC2 = $record2->num_rows;


$qry3 = "SELECT * FROM table_job ";
$record3 = $conn->query($qry3);
$rC3 = $record3->num_rows;

$qry4 = "SELECT * FROM training_table ";
$record4 = $conn->query($qry4);
$rC4 = $record4->num_rows;

$qry5 = "SELECT * FROM table_pembekal ";
$record5 = $conn->query($qry5);
$rC5 = $record5->num_rows;



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Halaman utama</title>
</head>
<body>
    
    <?php include('includes/header.php')  
    
    ?>
<div style="padding:10px">
<div class="row">
  <div class="col-sm-4">
      <div class="card  p-3 text-center">
    <h6>Nombor Barang <h6>
     <h2>  <?php echo $rC ?></h2>
     <div style="height:5px; background-color:red;"></div>
     </div>
  </div>

  <div class="col-sm-4">
    <div class="card  p-3 text-center">
    <h6>Nombor Perkhidmatan <h6>
     <h2>  <?php echo $rC2 ?></h2>
     <div style="height:5px; background-color:#68bf3d;"></div>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="card  p-3 text-center">
    <h6>Nombor Kursus latihan <h6>
     <h2>  <?php echo $rC4 ?></h2>
     <div style="height:5px; background-color:#f6dd66;"></div>
     </div>
</div>





<div style="height:10px"></div>

<div  style="display:flex;justify-content: space-between; ">

<div class="card" style="width:70vw;height:300px"><canvas id="bar-chart"></canvas></div>

<div>
<canvas class="card" style="width:25vw;height:300px" id="myChart"></canvas>

</div>


</div>

  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var data = <?php echo $data_json; ?>;
    var chart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: data.map(function(item) { return item.label; }),
        datasets: [{
          data: data.map(function(item) { return item.value; }),
          backgroundColor: [
            '#e6344a',
            'rgba(54, 162, 235, 0.8)'
          ]
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false
      }
    });
  </script>

<script>
        var ctx = document.getElementById('bar-chart').getContext('2d');
        var data = <?php echo $datak_json; ?>;
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.map(function(item) { return item.state; }),
                datasets: [{
                    label: 'Bilangan perkhidmatan',
                    data: data.map(function(item) { return item.num_products; }),
                    backgroundColor: '#B962DA',
                    barThickness: 8,
                    maxBarThickness: 8,
                    minBarLength: 6,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 10,
                           

                        }
                    }]
                }
            }
        });
    </script>






</div>
</body>












 








</html>