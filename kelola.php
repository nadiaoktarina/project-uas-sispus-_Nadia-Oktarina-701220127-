<!DOCTYPE html>
<?php
  include 'koneksi2.php';

  
    $id_mahasiswa = '';
    $nim = '';
    $nama = '';
    $alamat = '';
    $jenis_kelamin = '';
    $tanggal_lahir = '';
    $jurusan = '';
    $no_hp = '';
    $kelas = '';

    if(isset($_GET['ubah'])){
      $id_mahasiswa = $_GET['ubah'];

      $query = "SELECT * FROM mahasiswa WHERE id_mahasiswa = '$id_mahasiswa';";
      $sql = mysqli_query($conn, $query);
  
      $result = mysqli_fetch_assoc($sql);

    $nim = $result['nim'];
    $nama = $result['nama'];
    $alamat = $result['alamat'];
    $jenis_kelamin = $result['jenis_kelamin'];
    $tanggal_lahir = $result['tanggal_lahir'];
    $jurusan = $result['jurusan'];
    $no_hp = $result['no_hp'];
    $kelas = $result['kelas'];

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

    <title>DATA USER</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary mb-4">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            Data User
          </a>
        </div>
      </nav>
      <div class="container">
        <form action="proses.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo $id_mahasiswa; ?>" name="id_mahasiswa">
       <div class="mb-3 row">
        <label for="nim" class="col-sm-2 col-form-label">
          NIM
        </label>
        <div class="col-sm-10">
          <input required type="text" name="nim" class="form-control" id="nim" placeholder="ex:701234564" value="<?php echo $nim; ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">
          Nama
        </label>
        <div class="col-sm-10">
          <input required type="text" name="nama" class="form-control" id="nama" placeholder="ex:nadia" value="<?php echo $nama; ?>">
        </div>
      </div>
      <div class="mb-3 row">
        <label for="alamat" class="col-sm-2 col-form-label">
          Alamat
        </label>
        <div class="col-sm-10">
          <textarea required class="form-control" name="alamat" id="alamat" rows="3"><?php echo $alamat; ?></textarea>
        </div>
      </div>
      <div class="mb-3 row">
        <label for="jenis_kelamin" name="jenis_kelamin" class="col-sm-2 col-form-label" value="<?php echo $nama; ?>">
          Jenis Kelamin
        </label>
          <div class="col-sm-10">
            <input required class="form-check-input" type="radio" name="jenis_kelamin" id="pria" value="pria" required>
            <label class="form-check-label" for="pria">pria</label>
      
            <input required class="form-check-input" type="radio" name="jenis_kelamin" id="wanita" value="wanita" required>
            <label class="form-check-label" for="wanita">wanita</label>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tanggal_lahir" class="col-sm-2 col-form-label">
            Tanggal Lahir
          </label>
          <div class="col-sm-10">
          <input required type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required value="<?php echo $tanggal_lahir; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="jurusan" class="col-sm-2 col-form-label">
            Jurusan
          </label>
          <div class="col-sm-10">
            <input required type="text" name="jurusan" class="form-control" id="jurusan" placeholder="ex:teknik informatika" value="<?php echo $jurusan; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="no_hp" class="col-sm-2 col-form-label">
            No Handphone
          </label>
          <div class="col-sm-10">
            <input required type="number" name="no_hp" class="form-control" id="no_hp" placeholder="ex:085245676780" value="<?php echo $no_hp; ?>">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="kelas" class="col-sm-2 col-form-label">
            Kelas
          </label>
          <div class="col-sm-10">
            <input required type="text" name="kelas" class="form-control" id="kelas" placeholder="ex:3C" value="<?php echo $kelas; ?>">
          </div>
        </div>
          <div class="mb-3 row">
              <label for="nama" class="col-sm-2 col-form-label">
              Foto Mahasiswa
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