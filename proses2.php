<?php
    include 'koneksi2.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){

            $title = $_POST['title'];
            $isbn = $_POST['isbn'];
            $penerbit = $_POST['penerbit'];
            $tahunterbit = $_POST['tahunterbit'];
            $stokbuku = $_POST['stokbuku'];
            $dipinjam = $_POST['dipinjam'];
            $tanggalmasuk = $_POST['tanggalmasuk'];
            $gambar = $_FILES['gambar']['name'];

            $dir = "img/";
            $tmpFile = $_FILES['gambar']['tmp_name'];

            move_uploaded_file($tmpFile, $dir.$gambar);
            
            //die();

            $query = "INSERT INTO buku VALUES(null,'$title','$isbn','$penerbit','$tahunterbit','$stokbuku','$dipinjam','$tanggalmasuk','$gambar')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: buku.php");
                //echo "Data berhasil ditambahkan <a href='index.php'>[Home]</a>";
            }else{
                echo $query;
            }
            //echo $title." | ".$isbn." | ".$penerbit." | ".$penerbit." | ".$tahunterbit." | ".$stokbuku." | ".$dipinjam." | ".$tanggalmasuk." | ".$gambar;

            //echo "<br>Tambah data <a href='index.php'>[Home]</a>";
        } else if($_POST['aksi'] == "edit"){
            // echo "Edit data <a href='index.php'>[Home]</a>";
            // var_dump($_POST);

            $id_buku = $_POST['id_buku'];
            $title = $_POST['title'];
            $isbn = $_POST['isbn'];
            $penerbit = $_POST['penerbit'];
            $tahunterbit = $_POST['tahunterbit'];
            $stokbuku = $_POST['stokbuku'];
            $dipinjam = $_POST['dipinjam'];
            $tanggalmasuk = $_POST['tanggalmasuk'];

            $queryShow = "SELECT * FROM buku WHERE id_buku = '$id_buku';";
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

            $query = "UPDATE buku SET title='$title', isbn='$isbn', penerbit='$penerbit', tahunterbit='$tahunterbit', stokbuku='$stokbuku', dipinjam='$dipinjam', tanggalmasuk='$tanggalmasuk', gambar='$gambar' WHERE id_buku='$id_buku';";
            $sql =mysqli_query($conn, $query);
            header("location: buku.php");
        }
    }
    if(isset($_GET['hapus'])){
        $id_buku = $_GET['hapus'];

        $queryShow = "SELECT * FROM buku WHERE id_buku = '$id_buku';";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        // var_dump($result);

        unlink("img/".$result['gambar']);

        // die();

        $query = "DELETE FROM buku WHERE id_buku = '$id_buku';";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: buku.php");
            //echo "Data berhasil ditambahkan <a href='index.php'>[Home]</a>";
        }else{
            echo $query;
        
        //echo "Hapus data <a href='index.php'>[Home]</a>";
        }
    }
?>