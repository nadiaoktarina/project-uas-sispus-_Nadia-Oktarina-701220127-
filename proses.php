<?php
    include 'koneksi2.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){

            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $jurusan = $_POST['jurusan'];
            $no_hp = $_POST['no_hp'];
            $kelas = $_POST['kelas'];
            $gambar = $_FILES['gambar']['name'];

            $dir = "img/";
            $tmpFile = $_FILES['gambar']['tmp_name'];

            move_uploaded_file($tmpFile, $dir.$gambar);
            
            //die();

            $query = "INSERT INTO mahasiswa VALUES(null,'$nim','$nama','$alamat','$jenis_kelamin','$tanggal_lahir','$jurusan','$no_hp','$kelas','$gambar')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: halaman_admin.php");
                //echo "Data berhasil ditambahkan <a href='index.php'>[Home]</a>";
            }else{
                echo $query;
            }
            //echo $nama." | ".$alamat." | ".$jenis_kelamin." | ".$jenis_kelamin." | ".$tanggal_lahir." | ".$jurusan." | ".$no_hp." | ".$kelas." | ".$gambar;

            //echo "<br>Tambah data <a href='index.php'>[Home]</a>";
        } else if($_POST['aksi'] == "edit"){
            // echo "Edit data <a href='index.php'>[Home]</a>";
            // var_dump($_POST);

            $id_mahasiswa = $_POST['id_mahasiswa'];
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $jurusan = $_POST['jurusan'];
            $no_hp = $_POST['no_hp'];
            $kelas = $_POST['kelas'];

            $queryShow = "SELECT * FROM mahasiswa WHERE id_mahasiswa = '$id_mahasiswa';";
            $sqlShow = mysqli_query($conn, $queryShow);
            $result = mysqli_fetch_assoc($sqlShow);

            if ($_FILES['gambar']['name'] == "") {
                $gambar = $result['gambar'];
            } else {
                $gambar = $_FILES['gambar']['name'];
                unlink("img/".$result['gambar']);
                move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/'.$_FILES['gambar']['name']);
            }
            // var_dump($_FILES['gambar']['name']);
            // die();

            $query = "UPDATE mahasiswa SET nim='$nim',nama='$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', jurusan='$jurusan', no_hp='$no_hp', kelas='$kelas', gambar='$gambar' WHERE id_mahasiswa='$id_mahasiswa';";
            $sql =mysqli_query($conn, $query);
            header("location: halaman_admin.php");
        }
    }
    if(isset($_GET['hapus'])){
        $id_mahasiswa = $_GET['hapus'];

        $queryShow = "SELECT * FROM mahasiswa WHERE id_mahasiswa = '$id_mahasiswa';";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        // var_dump($result);

        unlink("img/".$result['gambar']);

        // die();

        $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = '$id_mahasiswa';";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: halaman_admin.php");
            //echo "Data berhasil ditambahkan <a href='index.php'>[Home]</a>";
        }else{
            echo $query;
        
        //echo "Hapus data <a href='index.php'>[Home]</a>";
        }
    }
?>