<!DOCTYPE html>
<?php
  include 'koneksi2.php';

  
    $id_denda = '';
    $harga_denda = '';
    $status = '';
    $tanggal_tetap = '';

    if(isset($_GET['ubah'])){
      $id_denda = $_GET['ubah'];

      $query = "SELECT * FROM denda WHERE id_denda = '$id_denda';";
      $sql = mysqli_query($conn, $query);
  
      $result = mysqli_fetch_assoc($sql);

    $harga_denda = $result['harga_denda'];
    $status = $result['status'];
    $tanggal_tetap = $result['tanggal_tetap'];

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

    <title>DATA DENDA</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary mb-4">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            Data Denda
          </a>
        </div>
      </nav>
      <div class="container">
        <form action="proses4.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo $id_denda; ?>" name="id_denda">
      <div class="mb-3 row">
        <label for="harga_denda" class="col-sm-2 col-form-label">
          Harga Denda
        </label>
        <div class="col-sm-10">
          <input required type="text" name="harga_denda" class="form-control" id="harga_denda" placeholder="" value="<?php echo $harga_denda; ?>">
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
          <label for="tanggal_tetap" class="col-sm-2 col-form-label">
            Tanggal tetap
          </label>
          <div class="col-sm-10">
          <input required type="date" class="form-control" id="tanggal_tetap" name="tanggal_tetap" required value="<?php echo $tanggal_tetap; ?>">
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
                <a href="denda.php" type="button" class="btn btn-danger">
                  <i class="fa fa-step-backward" aria-hidden="true"></i>
                  Batal
                </a>
              </div>
            </div>
          </form>
    </div>
</body>
</html>