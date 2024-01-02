<?php
  include 'koneksi2.php';

  $query = "SELECT * FROM pinjam;";
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
    <title>Cetak Data Peminjaman</title>
      <div class="table-responsive">
        <table class="table align-middle table-bordered table-hover">
          <thead>
            <tr>
              <th>id pinjam</th>
              <th>nama anggota</th>
              <th>judul buku</th>
              <th>tanggal pinjam</th>
              <th>lama pinjam</th>
              <th>tanggal balik</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($d = mysqli_fetch_assoc($sql)){} 
  if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $data = mysqli_query($conn,"select * from pinjam where nama_anggota like '%".$cari."%'");       
  }else{
    $data = mysqli_query($conn,"select * from pinjam");   
  }
  $no = 1;
  while($d = mysqli_fetch_array($data)){
  ?>
            <tr>
              <td><center>
                <?php echo $no++?>
              </center></td>
              <td>
                <?php echo $d['nama_anggota'];?>
              </td>
              <td>
                <?php echo $d['nama_buku'];?>
              </td>
              <td>
                <?php echo $d['tgl_pinjam'];?>
              </td>
              <td>
                <?php echo $d['lama_pinjam'];?>
              </td>
              <td>
                <?php echo $d['tgl_balik'];?>
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
