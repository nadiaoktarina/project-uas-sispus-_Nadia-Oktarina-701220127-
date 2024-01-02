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
    <title>HALAMAN PENGEMBALIAN</title>
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
<th><a href="halaman_admin.php"> User</a></th>
<th><a href="buku.php"> Buku</a></th>
<th><a href="peminjaman.php"> Peminjaman</a></th>
<th><a href="pengembalian.php"> Pengembalian</a></th>
<th><a href="denda.php"> Denda</a></th>
</tr>
</table>
    </nav>
<div class="container-fluid">
      <h1 class="mt-4">DATA PENGEMBALIAN</h1>
      <a href="kelola5.php" type="button" class="btn btn-primary mb-3">
        <i class="fa fa-plus"></i>
        Tambah Data
      </a>
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
              <th>id pinjam</th>
              <th>nama buku</th>
              <th>nama anggota</th>
              <th>status</th>
              <th>tanggal pinjam</th>
              <th>lama pinjam</th>
              <th>tanggal kembali</th>
              <th>denda</th>
              <th>aksi</th>
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
              <td>
                <a href="proses5.php?hapus=<?php echo $d['id_pinjam']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus data tersebut?')">
                    <i class="fa fa-trash"></i>
                </a>
                <a href="kelola5.php?ubah=<?php echo $d['id_pinjam']; ?>" type="button" class="btn btn-success btn-sm">
                    <i class="fa fa-pencil"></i>
                </a>
              </td>
            </tr>
            <?php
              }
              ?>
          </tbody>
          </table>
      </br>
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
