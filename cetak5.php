<?php
  include 'koneksi2.php';

  $query = "SELECT * FROM kembali;";
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
    <title>Cetak Data Pengembalian</title>
      <div class="table-responsive">
        <table class="table align-middle table-bordered table-hover">
          <thead>
            <tr>
              <th>id pinjam</th>
              <th>nama buku</th>
              <th>nama anggota</th>
              <th>status</th>
              <th>tanggal pinjam</th>
              <th>lama pinjam</th>
              <th>tanggal kembali</th>
              <th>denda</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($d = mysqli_fetch_assoc($sql)){} 
  if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $data = mysqli_query($conn,"select * from kembali where nama_buku like '%".$cari."%'");       
  }else{
    $data = mysqli_query($conn,"select * from kembali");   
  }
  $no = 1;
  while($d = mysqli_fetch_array($data)){
  ?>
            <tr>
              <td><center>
                <?php echo $no++?>
              </center></td>
              <td>
                <?php echo $d['nama_buku'];?>
              </td>
              <td>
                <?php echo $d['nama_anggota'];?>
              </td>
              <td>
                <?php echo $d['status'];?>
              </td>
              <td>
                <?php echo $d['tgl_pinjam'];?>
              </td>
              <td>
                <?php echo $d['lama_pinjam'];?>
              </td>
              <td>
                <?php echo $d['tgl_kembali'];?>
              </td>
              <td>
                <?php echo $d['denda'];?>
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
