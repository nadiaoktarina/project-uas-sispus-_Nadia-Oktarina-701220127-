<?php
    include 'koneksi2.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){

            $nama_anggota = $_POST['nama_anggota'];
            $nama_buku = $_POST['nama_buku'];
            $tgl_pinjam = $_POST['tgl_pinjam'];
            $lama_pinjam = $_POST['lama_pinjam'];
            $tgl_balik = $_POST['tgl_balik'];
            
            //die();

            $query = "INSERT INTO pinjam VALUES(null,'$nama_anggota','$nama_buku','$tgl_pinjam','$lama_pinjam','$tgl_balik')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: peminjaman.php");
                //echo "Data berhasil ditambahkan <a href='index.php'>[Home]</a>";
            }else{
                echo $query;
            }
            //echo $nama_anggota." | ".$nama_buku." | ".$tgl_pinjam." | ".$tgl_pinjam." | ".$lama_pinjam." | ".$tgl_balik." | ".$no_hp." | ".$kelas." | ".$gambar;

            //echo "<br>Tambah data <a href='index.php'>[Home]</a>";
        } else if($_POST['aksi'] == "edit"){
            // echo "Edit data <a href='index.php'>[Home]</a>";
            // var_dump($_POST);

            $id_pinjam = $_POST['id_pinjam'];
            $nama_anggota = $_POST['nama_anggota'];
            $nama_buku = $_POST['nama_buku'];
            $tgl_pinjam = $_POST['tgl_pinjam'];
            $lama_pinjam = $_POST['lama_pinjam'];
            $tgl_balik = $_POST['tgl_balik'];

            $queryShow = "SELECT * FROM pinjam WHERE id_pinjam = '$id_pinjam';";
            $sqlShow = mysqli_query($conn, $queryShow);
            $result = mysqli_fetch_assoc($sqlShow);

            // var_dump($_FILES['gambar']['name']);
            // die();

            $query = "UPDATE pinjam SET nama_anggota='$nama_anggota', nama_buku='$nama_buku', tgl_pinjam='$tgl_pinjam', lama_pinjam='$lama_pinjam', tgl_balik='$tgl_balik' WHERE id_pinjam='$id_pinjam';";
            $sql =mysqli_query($conn, $query);
            header("location: peminjaman.php");
        }
    }
    if(isset($_GET['hapus'])){
        $id_pinjam = $_GET['hapus'];

        $queryShow = "SELECT * FROM pinjam WHERE id_pinjam = '$id_pinjam';";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        // var_dump($result);

        // die();

        $query = "DELETE FROM pinjam WHERE id_pinjam = '$id_pinjam';";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: peminjaman.php");
            //echo "Data berhasil ditambahkan <a href='index.php'>[Home]</a>";
        }else{
            echo $query;
        
        //echo "Hapus data <a href='index.php'>[Home]</a>";
        }
    }
?>