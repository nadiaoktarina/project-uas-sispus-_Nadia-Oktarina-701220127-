
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    
</head>

<body>
    
    <style type="text/css">
    body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: url('img/perpus.jpg') fixed;
    background-size: cover;
    margin: 0;
    padding: 0;
}
 
h1{
    text-align: center;
    /*ketebalan font*/
    font-weight: 300;
    color: white;
    font-weight: bold;
}
 
.tulisan_registrasi{
    text-align: center;
    /*membuat semua huruf menjadi kapital*/
    text-transform: uppercase;
}
 
.kotak_registrasi{
    width: 350px;
    background: white;
    /*meletakkan form ke tengah*/
    margin: 80px auto;
    padding: 30px 20px;
    box-shadow: 0px 0px 100px 4px #d6d6d6;
}
 
label{
    font-size: 11pt;
}
 
.form_registrasi{
    /*membuat lebar form penuh*/
    box-sizing : border-box;
    width: 100%;
    padding: 10px;
    font-size: 11pt;
    margin-bottom: 20px;
}
 
.tombol_register{
    background: #2aa7e2;
    color: white;
    font-size: 11pt;
    width: 100%;
    border: none;
    border-radius: 3px;
    padding: 10px 20px;
}
 
.link{
    color: #232323;
    text-decoration: none;
    font-size: 10pt;
}
 
.alert{
    background: #e44e4e;
    color: white;
    padding: 10px;
    text-align: center;
    border:1px solid #b32929;
}

    </style>
    <h1>Halaman Registrasi<br> 
    Sistem Informasi Perpustakaan<br>
    Universitas Adiwangsa Jambi</h1>
 
    <div class="kotak_registrasi">
        <p class="tulisan_registrasi">Silahkan Registrasi</p>
 
        <form action="proses6.php" method="post">
            <label>Nama</label>
            <input type="text" name="nama" class="form_registrasi" placeholder="Nama .." required="required">

            <label>Username</label>
            <input type="text" name="username" class="form_registrasi" placeholder="Username .." required="required">
 
            <label>Password</label>
            <input type="password" name="password" class="form_registrasi" placeholder="Password .." required="required">

            <label>Level</label>
            <input type="text" name="level" class="form_registrasi" placeholder="Level .." required="required">
 
            <input type="submit" class="tombol_register" value="Registrasi"><br><br>

            <a href="index.php" type="button" class="tombol_register">
              Batal
            </a>
 
            <br/>
            <br/>
        </form>
        
    </div>
 
 
</body>
</html>