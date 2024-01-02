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
    <title>HALAMAN BUKU</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
        }

        section {
            padding: 20px;
            text-align: center;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        .logout {
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            margin : 280px auto;
            cursor: pointer;
            text-decoration: none;
            position: absolute;
            top: 8px;
            right: 16px;
            font-size: 15px;
        }

    </style>
</head>
<body>

    <header>
        <img src="img/slide5.jpg" style="width: 1200px; height: 200px;">
    </header>

    <nav>
<table border="3" width="100%" cellpadding="5">
<tr>
<th><a href="halaman_kepala perpus.php"> User</a></th>
<th><a href="buku3.php"> Buku</a></th>
<th><a href="peminjaman3.php"> Peminjaman</a></th>
<th><a href="pengembalian3.php"> Pengembalian</a></th>
<th><a href="denda3.php"> Denda</a></th>
</tr>
</table>
    </nav>
<div class="container-fluid">
      <h1 class="mt-4">DATA BUKU</h1>
      <a class="btn btn-warning btn-lg" href="unduhdata2.php" role="button"><i class="fa fa-cloud-download">UNDUH</i></a>
    <section>
    </center>
    <form action="" method="get">
    <center><label>Cari :</label>
  <input type="text" name="cari">
  <input type="submit" value="Cari">
<?php 
if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  echo "<p>Hasil pencarian : ".$cari."</p>";
}
?></center>
    </section>
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
                <img src="img/<?php echo $d['gambar']; ?>" style="width: 150px;">
              </td>
            </tr>
            <?php
              }
              ?>
          </tbody>
          </table>
      </br>
          <center><a class="btn btn-primary btn-lg" href="cetak2.php" role="button">Cetak</a></center>
      </div>
      </div>
    </section>
    <div class="logout">
    <a href="logout.php">LOGOUT</a>
    </div>
    <br/>

    <footer>
        <p>&copy; 2023 Nadia Oktarina.All rights reserved</p>
    </footer>

</body>
</html>
