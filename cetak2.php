<?php
  include 'koneksi2.php';

  $query = "SELECT * FROM buku;";
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
    <title>Cetak Data Buku</title>
      <div class="table-responsive">
        <table class="table align-middle table-bordered table-hover">
          <thead>
            <tr>
              <th>id buku</th>
              <th>judul buku</th>
              <th>isbn</th>
              <th>penerbit</th>
              <th>tahun terbit</th>
              <th>stok buku</th>
              <th>dipinjam</th>
              <th>tanggal masuk</th>
              <th>sampul</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($d = mysqli_fetch_assoc($sql)){} 
  if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $data = mysqli_query($conn,"select * from buku where title like '%".$cari."%'");       
  }else{
    $data = mysqli_query($conn,"select * from buku");   
  }
  $no = 1;
  while($d = mysqli_fetch_array($data)){
  ?>
            <tr>
              <td><center>
                <?php echo $no++?>
              </center></td>
              <td>
                <?php echo $d['title'];?>
              </td>
              <td>
                <?php echo $d['isbn'];?>
              </td>
              <td>
                <?php echo $d['penerbit'];?>
              </td>
              <td>
                <?php echo $d['tahunterbit'];?>
              </td>
              <td>
                <?php echo $d['stokbuku'];?>
              </td>
              <td>
                <?php echo $d['dipinjam'];?>
              </td>
              <td>
                <?php echo $d['tanggalmasuk'];?>
              </td>
              <td>
                <img src="img/<?php echo $d['gambar']; ?>" style="width: 50px;">
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
