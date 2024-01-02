<!DOCTYPE html>
<?php
  include 'koneksi2.php';

  
    $id_buku = '';
    $title = '';
    $isbn = '';
    $penerbit = '';
    $tahunterbit = '';
    $stokbuku = '';
    $dipinjam = '';
    $tanggalmasuk = '';

    if(isset($_GET['ubah'])){
      $id_buku = $_GET['ubah'];

      $query = "SELECT * FROM buku WHERE id_buku = '$id_buku';";
      $sql = mysqli_query($conn, $query);
  
      $result = mysqli_fetch_assoc($sql);

    $title = $result['title'];
    $isbn = $result['isbn'];
    $penerbit = $result['penerbit'];
    $tahunterbit = $result['tahunterbit'];
    $stokbuku = $result['stokbuku'];
    $dipinjam = $result['dipinjam'];
    $tanggalmasuk = $result['tanggalmasuk'];

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

    <title>DATA BUKU</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary mb-4">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            Data Buku
          </a>
        </div>
      </nav>
      <div class="container">
        <form action="proses2.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo $id_buku; ?>" name="id_buku">
      <div class="mb-3 row">
        <label for="title" class="col-sm-2 col-form-label">
          title
        </label>
        <div class="col-sm-10">
          <input required type="text" name="title" class="form-control" id="title" placeholder="" value="<?php echo $title; ?>">
        </div>
      </div>
      <div class="mb-3 row">
          <label for="isbn" class="col-sm-2 col-form-label">
            isbn
          </label>
          <div class="col-sm-10">
            <input required type="text" name="isbn" class="form-control" id="isbn" placeholder="" value="<?php echo $isbn; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="penerbit" class="col-sm-2 col-form-label">
            penerbit
          </label>
          <div class="col-sm-10">
            <input required type="text" name="penerbit" class="form-control" id="penerbit" placeholder="" value="<?php echo $penerbit; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tahunterbit" class="col-sm-2 col-form-label">
            tahunterbit
          </label>
          <div class="col-sm-10">
            <input required type="text" name="tahunterbit" class="form-control" id="tahunterbit" placeholder="" value="<?php echo $tahunterbit; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="stokbuku" class="col-sm-2 col-form-label">
            stokbuku
          </label>
          <div class="col-sm-10">
            <input required type="number" name="stokbuku" class="form-control" id="stokbuku" placeholder="" value="<?php echo $stokbuku; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="dipinjam" class="col-sm-2 col-form-label">
            dipinjam
          </label>
          <div class="col-sm-10">
            <input required type="number" name="dipinjam" class="form-control" id="dipinjam" placeholder="" value="<?php echo $dipinjam; ?>">
          </div>
        </div>
          <div class="mb-3 row">
          <label for="tanggalmasuk" class="col-sm-2 col-form-label">
            Tanggal masuk
          </label>
          <div class="col-sm-10">
          <input required type="date" class="form-control" id="tanggalmasuk" name="tanggalmasuk" required value="<?php echo $tanggalmasuk; ?>">
          </div>
        </div>
          <div class="mb-3 row">
              <label for="title" class="col-sm-2 col-form-label">
              Foto buku
              </label>
            <div class="col-sm-10">
              <input <?php if(!isset($_GET['ubah'])){ echo "required";} ?> class="form_control" type="file" name="gambar" id="gambar" accept="image/*">
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
                <a href="buku.php" type="button" class="btn btn-danger">
                  <i class="fa fa-step-backward" aria-hidden="true"></i>
                  Batal
                </a>
              </div>
            </div>
          </form>
    </div>
</body>
</html>