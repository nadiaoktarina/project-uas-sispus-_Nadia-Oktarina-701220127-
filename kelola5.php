<!DOCTYPE html>
<?php
  include 'koneksi2.php';

  
    $id_pinjam = '';
    $nama_buku = '';
    $nama_anggota = '';
    $nama_buku = '';
    $tgl_pinjam = '';
    $lama_pinjam = '';
    $tgl_kembali = '';
    $denda = '';

    if(isset($_GET['ubah'])){
      $id_pinjam = $_GET['ubah'];

      $query = "SELECT * FROM kembali WHERE id_pinjam = '$id_pinjam';";
      $sql = mysqli_query($conn, $query);
  
      $result = mysqli_fetch_assoc($sql);

    $nama_buku = $result['nama_buku'];
    $nama_anggota = $result['nama_anggota'];
    $nama_buku = $result['nama_buku'];
    $tgl_pinjam = $result['tgl_pinjam'];
    $lama_pinjam = $result['lama_pinjam'];
    $tgl_kembali = $result['tgl_kembali'];
    $denda = $result['denda'];

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

    <title>DATA PENGEMBALIAN</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary mb-4">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            Data Pengembalian
          </a>
        </div>
      </nav>
      <div class="container">
        <form action="proses5.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo $id_pinjam; ?>" name="id_pinjam">
      <div class="mb-3 row">
        <label for="nama_buku" class="col-sm-2 col-form-label">
          Nama buku
        </label>
        <div class="col-sm-10">
          <input required type="text" name="nama_buku" class="form-control" id="nama_buku" placeholder="" value="<?php echo $nama_buku; ?>">
        </div>
      </div>
         <div class="mb-3 row">
          <label for="nama_anggota" class="col-sm-2 col-form-label">
            Nama anggota
          </label>
          <div class="col-sm-10">
            <input required type="text" name="nama_anggota" class="form-control" id="nama_anggota" placeholder="" value="<?php echo $nama_anggota; ?>">
          </div>
        </div>
         <div class="mb-3 row">
          <label for="status" class="col-sm-2 col-form-label">
            Status
          </label>
          <div class="col-sm-10">
            <input required type="text" name="status" class="form-control" id="status" placeholder="" value="<?php echo $status; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tgl_pinjam" class="col-sm-2 col-form-label">
            Tanggal pinjam
          </label>
          <div class="col-sm-10">
          <input required type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam" required value="<?php echo $tgl_pinjam; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="lama_pinjam" class="col-sm-2 col-form-label">
            Lama pinjam
          </label>
          <div class="col-sm-10">
            <input required type="text" name="lama_pinjam" class="form-control" id="lama_pinjam" placeholder="" value="<?php echo $lama_pinjam; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tgl_kembali" class="col-sm-2 col-form-label">
            Tanggal kembali
          </label>
          <div class="col-sm-10">
          <input required type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" required value="<?php echo $tgl_kembali; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="denda" class="col-sm-2 col-form-label">
            Denda
          </label>
          <div class="col-sm-10">
            <input required type="text" name="denda" class="form-control" id="denda" placeholder="" value="<?php echo $denda; ?>">
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
                <a href="pengembalian.php" type="button" class="btn btn-danger">
                  <i class="fa fa-step-backward" aria-hidden="true"></i>
                  Batal
                </a>
              </div>
            </div>
          </form>
    </div>
</body>
</html>