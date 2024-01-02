<?php
  include 'koneksi2.php';

  $query = "SELECT * FROM denda;";
  $sql = mysqli_query($conn, $query);
  $no = 0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">
    <title>Cetak Data Denda</title>
      <div class="table-responsive">
        <table class="table align-middle table-bordered table-hover">
          <thead>
            <tr>
              <th>id_denda</th>
              <th>Harga denda</th>
              <th>status</th>
              <th>tanggal tetap</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($d = mysqli_fetch_assoc($sql)){} 
  if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $data = mysqli_query($conn,"select * from denda where status like '%".$cari."%'");       
  }else{
    $data = mysqli_query($conn,"select * from denda");   
  }
  $no = 1;
  while($d = mysqli_fetch_array($data)){
  ?>
            <tr>
              <td><center>
                <?php echo $no++?>
              </center></td>
              <td>
                <?php echo $d['harga_denda'];?>
              </td>
              <td>
                <?php echo $d['status'];?>
              </td>
              <td>
                <?php echo $d['tanggal_tetap'];?>
              </td>
            </tr>
            <?php
              }
              ?>
          </tbody>
          </table>
    <script>
    window.print();
    </script>

</body>
</html>
