<!DOCTYPE html>
<?php
  include 'koneksi2.php';

  
    $id_pinjam = '';
    $nama_anggota = '';
    $nama_buku = '';
    $tgl_pinjam = '';
    $lama_pinjam = '';
    $tgl_kembali = '';

    if(isset($_GET['ubah'])){
      $id_pinjam = $_GET['ubah'];

      $query = "SELECT * FROM pinjam WHERE id_pinjam = '$id_pinjam';";
      $sql = mysqli_query($conn, $query);
  
      $result = mysqli_fetch_assoc($sql);

    $nama_anggota = $result['nama_anggota'];
    $nama_buku = $result['nama_buku'];
    $tgl_pinjam = $result['tgl_pinjam'];
    $lama_pinjam = $result['lama_pinjam'];
    $tgl_balik = $result['tgl_balik'];

    // var_dump($result);

    // die();
  }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

    <title>DATA PEMINJAMAN</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary mb-4">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            Data Peminjaman
          </a>
        </div>
      </nav>
      <div class="container">
        <form action="proses3.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo $id_pinjam; ?>" name="id_pinjam">
      <div class="mb-3 row">
        <label for="nama_anggota" class="col-sm-2 col-form-label">
          Nama anggota
        </label>
        <div class="col-sm-10">
          <input required type="text" name="nama_anggota" class="form-control" id="nama_anggota" placeholder="" value="<?php echo $nama_anggota; ?>">
        </div>
      </div>
      <div class="mb-3 row">
          <label for="nama_buku" class="col-sm-2 col-form-label">
            Judul Buku
          </label>
          <div class="col-sm-10">
            <input required type="text" name="nama_buku" class="form-control" id="nama_buku" placeholder="" value="<?php echo $nama_buku; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tgl_pinjam" class="col-sm-2 col-form-label">
            Tanggal Pinjam
          </label>
          <div class="col-sm-10">
          <input required type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" required value="<?php echo $tgl_pinjam; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="lama_pinjam" class="col-sm-2 col-form-label">
            lama_pinjam
          </label>
          <div class="col-sm-10">
            <input required type="text" name="lama_pinjam" class="form-control" id="lama_pinjam" placeholder="" value="<?php echo $lama_pinjam; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tgl_balik" class="col-sm-2 col-form-label">
            Tanggal Balik
          </label>
          <div class="col-sm-10">
          <input required type="date" class="form-control" id="tgl_balik" name="tgl_balik" required value="<?php echo $tgl_pinjam; ?>">
          </div>
        </div>
            <div class="mb-3 row mt-4">
              <div class="col">
                <?php
                if(isset($_GET['ubah'])){
                ?>
                <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                  <i class="fa fa-floppy-o" aria-hidden="true"></i>
                  Simpan Perubahan
                </button>
                <?php
                  } else {
                ?>
                <button type="submit" name="aksi" value="add" class="btn btn-primary">
                  <i class="fa fa-floppy-o" aria-hidden="true"></i>
                  Tambahkan
                </button>
                <?php
                  }
                ?>
                <a href="halaman_admin.php" type="button" class="btn btn-danger">
                  <i class="fa fa-step-backward" aria-hidden="true"></i>
                  Batal
                </a>
              </div>
            </div>
          </form>
    </div>
</body>
</html>