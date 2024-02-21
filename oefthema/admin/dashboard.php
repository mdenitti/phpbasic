<?php include 'header.php'; ?>
<?php require '../global.php';?>
<?php session_start(); checkLoggedIn();?>

<h1><span class="fat">Dashboard</span>Admin</h1>
<h2>Welcome <?php echo $_SESSION['name']?></h2>
<a href="logout.php" class="btn btn-danger mb-3">Logout</a>


<div class="row">
    <div class="col-md-3"><h3>MyChart</h3></div>
    <div class="col-md-9">
        <div>
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>


<p>I am allowed to be here<p>



<?php 
$sql = "SELECT
r.id,
r.`name`,
r.email,
r.`date`,
r.tel,
t.`name` AS themeday
FROM 
registrations r
JOIN 
tdays t ON t.id = r.tday_id;
";
$results = mysqli_query($conn, $sql);
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Tel</th>
      <th scope="col">Tday</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($results as $result) {?>
        <tr>
            <th scope="row"><?php echo $result['id'] ?></th>
            <td><?php echo $result['name'] ?></td>
            <td><?php echo $result['email'] ?></td>
            <td><?php echo $result['tel'] ?></td>
            <td><?php echo $result['themeday'] ?></td>
            <td><a href="delete.php?id=<?php echo $result['id'] ?>" class="btn btn-sm btn-outline-danger">x</a></td>
        </tr>
   <?php } ?>
  </tbody>
</table>

<?php
    // Query to get locations and their bookings
    $sql = "SELECT l.name AS location, l.amount AS total, COUNT(r.id) AS booked
            FROM locations l
            LEFT JOIN tdays t ON l.id = t.location_id
            LEFT JOIN registrations r ON t.id = r.tday_id
            GROUP BY l.id";

    $result = mysqli_query($conn, $sql);

    $locations = [];
    $total = [];
    $booked = [];

// Store data in arrays for Chart.js using foreach loop
if (mysqli_num_rows($result) > 0) {
    foreach ($result as $row) {
        $locations[] = $row['location'];
        $total[] = $row['total'];
        $booked[] = $row['booked'];
    }
}

?>

<script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($locations); ?>,
                datasets: [{
                    label: 'Total Places',
                    data: <?php echo json_encode($total); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }, {
                    label: 'Booked Places',
                    data: <?php echo json_encode($booked); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>

<?php include 'footer.php'; ?>