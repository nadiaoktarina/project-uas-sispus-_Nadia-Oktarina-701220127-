<?php
    include 'koneksi2.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){

            $nama_buku = $_POST['nama_buku'];
            $nama_anggota = $_POST['nama_anggota'];
            $status = $_POST['status'];
            $tgl_pinjam = $_POST['tgl_pinjam'];
            $lama_pinjam = $_POST['lama_pinjam'];
            $tgl_kembali = $_POST['tgl_kembali'];
            $denda = $_POST['denda'];
            
            //die();

            $query = "INSERT INTO kembali VALUES(null,'$nama_buku','$nama_anggota','$status','$tgl_pinjam','$lama_pinjam','$tgl_kembali','$denda')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: pengembalian.php");
                //echo "Data berhasil ditambahkan <a href='index.php'>[Home]</a>";
            }else{
                echo $query;
            }
            //echo $nama_buku." | ".$nama_anggota." | ".$status." | ".$status." | ".$tgl_pinjam." | ".$lama_pinjam." | ".$tgl_kembali." | ".$denda." | ".$gambar;

            //echo "<br>Tambah data <a href='index.php'>[Home]</a>";
        } else if($_POST['aksi'] == "edit"){
            // echo "Edit data <a href='index.php'>[Home]</a>";
            // var_dump($_POST);

            $id_pinjam = $_POST['id_pinjam'];
            $nama_buku = $_POST['nama_buku'];
            $nama_anggota = $_POST['nama_anggota'];
            $status = $_POST['status'];
            $tgl_pinjam = $_POST['tgl_pinjam'];
            $lama_pinjam = $_POST['lama_pinjam'];
            $tgl_kembali = $_POST['tgl_kembali'];
            $denda = $_POST['denda'];

            $queryShow = "SELECT * FROM kembali WHERE id_pinjam = '$id_pinjam';";
            $sqlShow = mysqli_query($conn, $queryShow);
            $result = mysqli_fetch_assoc($sqlShow);

            // var_dump($_FILES['gambar']['name']);
            // die();

            $query = "UPDATE kembali SET nama_buku='$nama_buku', nama_anggota='$nama_anggota', status='$status', tgl_pinjam='$tgl_pinjam', lama_pinjam='$lama_pinjam', tgl_kembali='$tgl_kembali', denda='$denda' WHERE id_pinjam='$id_pinjam';";
            $sql =mysqli_query($conn, $query);
            header("location: pengembalian.php");
        }
    }
    if(isset($_GET['hapus'])){
        $id_pinjam = $_GET['hapus'];

        $queryShow = "SELECT * FROM kembali WHERE id_pinjam = '$id_pinjam';";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        // var_dump($result);


        // die();

        $query = "DELETE FROM kembali WHERE id_pinjam = '$id_pinjam';";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: pengembalian.php");
            //echo "Data berhasil ditambahkan <a href='index.php'>[Home]</a>";
        }else{
            echo $query;
        
        //echo "Hapus data <a href='index.php'>[Home]</a>";
        }
    }
?>