<?php
  include 'koneksi2.php';

  $query = "SELECT * FROM mahasiswa;";
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
    <title>Cetak Data Anggota</title>
      <div class="table-responsive">
        <table class="table align-middle table-bordered table-hover">
          <thead>
            <tr>
              <th>id_mahasiswa</th>
              <th>nim</th>
              <th>nama</th>
              <th>alamat</th>
              <th>jenis_kelamin</th>
              <th>tanggal_lahir</th>
              <th>jurusan</th>
              <th>no_hp</th>
              <th>kelas</th>
              <th>gambar</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($d = mysqli_fetch_assoc($sql)){} 
  if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $data = mysqli_query($conn,"select * from mahasiswa where nama like '%".$cari."%'");       
  }else{
    $data = mysqli_query($conn,"select * from mahasiswa");   
  }
  $no = 1;
  while($d = mysqli_fetch_array($data)){
  ?>
            <tr>
              <td><center>
                <?php echo $no++?>
              </center></td>
              <td>
                <?php echo $d['nim'];?>
              </td>
              <td>
                <?php echo $d['nama'];?>
              </td>
              <td>
                <?php echo $d['alamat'];?>
              </td>
              <td>
                <?php echo $d['jenis_kelamin'];?>
              </td>
              <td>
                <?php echo $d['tanggal_lahir'];?>
              </td>
              <td>
                <?php echo $d['jurusan'];?>
              </td>
              <td>
                <?php echo $d['no_hp'];?>
              </td>
              <td>
                <?php echo $d['kelas'];?>
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
