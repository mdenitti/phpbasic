<?php include 'header.php'; ?>
<?php require '../global.php';?>
<?php session_start(); checkLoggedIn();?>

<h1><span class="fat">Dashboard</span>Admin</h1>
<h2>Welcome <?php echo $_SESSION['name']?></h2>
<a href="logout.php" class="btn btn-danger mb-3">Logout</a>
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
        </tr>
   <?php } ?>
    

  </tbody>
</table>


<?php include 'footer.php'; ?>