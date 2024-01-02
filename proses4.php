<?php
    include 'koneksi2.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){

            $harga_denda = $_POST['harga_denda'];
            $status = $_POST['status'];
            $tanggal_tetap = $_POST['tanggal_tetap'];
            $query = "INSERT INTO denda VALUES(null,'$harga_denda','$status','$tanggal_tetap')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: denda.php");
                //echo "Data berhasil ditambahkan <a href='index.php'>[Home]</a>";
            }else{
                echo $query;
            }
            //echo $harga_denda." | ".$status." | ".$penerbit." | ".$penerbit." | ".$tahunterbit." | ".$stokdenda." | ".$dipinjam." | ".$tanggal_tetap." | ".$gambar;

            //echo "<br>Tambah data <a href='index.php'>[Home]</a>";
        } else if($_POST['aksi'] == "edit"){
            // echo "Edit data <a href='index.php'>[Home]</a>";
            // var_dump($_POST);

            $id_denda = $_POST['id_denda'];
            $harga_denda = $_POST['harga_denda'];
            $status = $_POST['status'];
            $tanggal_tetap = $_POST['tanggal_tetap'];

            $queryShow = "SELECT * FROM denda WHERE id_denda = '$id_denda';";
            $sqlShow = mysqli_query($conn, $queryShow);
            $result = mysqli_fetch_assoc($sqlShow);

            // var_dump($_FILES['gambar']['name']);
            // die();

            $query = "UPDATE denda SET harga_denda='$harga_denda', status='$status', tanggal_tetap='$tanggal_tetap' WHERE id_denda='$id_denda';";
            $sql =mysqli_query($conn, $query);
            header("location: denda.php");
        }
    }
    if(isset($_GET['hapus'])){
        $id_denda = $_GET['hapus'];

        $queryShow = "SELECT * FROM denda WHERE id_denda = '$id_denda';";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        // var_dump($result);
        // die();

        $query = "DELETE FROM denda WHERE id_denda = '$id_denda';";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: denda.php");
            //echo "Data berhasil ditambahkan <a href='index.php'>[Home]</a>";
        }else{
            echo $query;
        
        //echo "Hapus data <a href='index.php'>[Home]</a>";
        }
    }
?>